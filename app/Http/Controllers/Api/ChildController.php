<?php

namespace App\Http\Controllers\Api;

use App\Child;
use App\Enrollment;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Child\StoreChild;
use App\Http\Requests\Web\Child\UpdateChild;
use App\PhClass;
use App\RelationshipType;
use App\Relative;
use Carbon\Carbon;
use Dompdf\Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ChildController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $data = SavbitsHelper::listing(Child::class,$request)->customQuery(function($q) {
            //
        })->process();
        return jsonRes(true, "Children index", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreChild $request)
    {
        try {
            $data = $request->getSanitized();
            $child = new Child($data);
            \DB::transaction(function() use ($request, $data, $child) {
                if (!$child->enrollment_date) {
                    $child->enrollment_date = now();
                }
                $child->active = true;
                $child->saveOrFail();

                //Save Relatives

                if (sizeof(collect($data)->get('relatives'))) {
                    $relativesArray = collect($data)->get('relatives');
                    $relatives = [];
                    foreach ($relativesArray as $relativeArray) {
                        $val = \Validator::make($relativeArray,[
                            "custom_relationship" => "nullable|string",
                            "relationship_type" => "required|array",
                            "user" => "required|array"
                        ]);
                        if ($val->fails()) {
                            throw new ValidationException($val);
                        }
                        $customRelation = RelationshipType::whereName("Custom")->firstOrFail();
                        $relativeObj = json_decode(collect($relativeArray));

                        $relative = new Relative();
                        $relative->relationshipType()->associate($relativeObj->relationship_type->id);
                        if ($relativeObj->relationship_type->id === $customRelation->id) {
                            $val = \Validator::make($relativeArray,[
                                "custom_relationship" => "required|string"
                            ]);
                            if ($val->fails()) {
                                throw new ValidationException($val);
                            }

                            $relative->custom_relationship = $relativeObj->custom_relationship;
                        }
                        $relative->user()->associate($relativeObj->user->id);
                        $relative->child()->associate($child);
                        array_push($relatives,$relative);
                    }
                    $child->relatives()->saveMany($relatives);
                }
                //END SAVE RELATIVES

                // Enroll to appropriate class
                $age = now()->diffInYears(Carbon::parse($child->dob));
                //Find appropriate class
                $class = PhClass::where("minimum_age","<=",$age)
                    ->where("maximum_age",">=",$age)
                    ->first();
                if ($class) {
                    $enrollment = new Enrollment();
                    $enrollment->phClass()->associate($class);
                    $enrollment->child()->associate($child);
                    $enrollment->enrollment_date = now()->toDateString();
                    $enrollment->saveOrFail();
                }
            });
            return jsonRes(true, "Child created successfully", $child,200);
        } catch (QueryException $exception) {
            \Log::info($exception);
            return jsonRes(false, $exception->errorInfo[2],null, 500);
        } catch (ValidationException $exception) {
            \Log::info($exception);
            return jsonRes(false, $exception->getMessage(),null, 500);
        } catch (\Throwable $exception) {
            \Log::info($exception);
            return jsonRes(false, $exception->getMessage(),null, 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        try {
            $child = Child::whereId($id)->with([
                "relatives.user",
                "relatives.relationshipType",
                "enrollments.phClass",
            ])->firstOrFail();

            return jsonRes(true, "Child $id", $child);
        } catch (\Throwable $exception) {
            return jsonRes(false, $exception->getMessage(),null,400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateChild $request, Child $child)
    {
        try {
            \DB::transaction(function() use ($request, $child) {
                $data = $request->getSanitized();
                $child->update($data);
                if (sizeof(collect($data)->get('relatives'))) {
                    $relativesArray = collect($data)->get('relatives');
                    $relatives = [];
                    foreach ($relativesArray as $relativeArray) {
                        $val = \Validator::make($relativeArray,[
                            "custom_relationship" => "nullable|string",
                            "relationship_type" => "required|array",
                            "user" => "required|array"
                        ]);
                        if ($val->fails()) {
                            throw new ValidationException($val);
                        }
                        $customRelation = RelationshipType::whereName("Custom")->firstOrFail();
                        $relativeObj = json_decode(collect($relativeArray));

                        $relative = new Relative();
                        $relative->relationshipType()->associate($relativeObj->relationship_type->id);
                        if ($relativeObj->relationship_type->id === $customRelation->id) {
                            $val = \Validator::make($relativeArray,[
                                "custom_relationship" => "required|string"
                            ]);
                            if ($val->fails()) {
                                throw new ValidationException($val);
                            }

                            $relative->custom_relationship = $relativeObj->custom_relationship;
                        }
                        $existing = Relative::whereChildId($child->id)
                            ->where("user_id","=", $relativeObj->user->id)->first();
                        if ($existing) {
                            $existing->relationshipType()->associate($relativeObj->relationship_type->id);
                            if ($relative->custom_relationship) {
                                $existing->custom_relationship = $relative->custom_relationship;
                            }
                            $existing->saveOrFail();
                        } else {
                            $relative->user()->associate($relativeObj->user->id);
                            $relative->child()->associate($child);
                            array_push($relatives,$relative);
                        }
                    }
                    $child->relatives()->saveMany($relatives);
                }
            });
            return jsonRes(true, "Update successful",$child);
        } catch (ValidationException $exception) {
            return jsonRes(false, $exception->validator->getMessageBag()->first(), $exception->errors(),422);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), null, 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadAvatar(Request $request,Child $child) {
        // Save the file to the disk and return path:
        $file = $request->file('avatar');
        $media = $child->addMedia($file)
            ->setFileName($child->id.".".$file->extension())
            ->setName("child-$child->id-avatar")
            ->toMediaCollection('avatar',"public");
        $media->saveOrFail();
        return jsonRes(true, "Image uploaded",$media);
    }
}
