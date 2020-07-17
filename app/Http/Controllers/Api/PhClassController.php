<?php

namespace App\Http\Controllers\Api;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\PhClass;
use App\RollCall;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PhClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $classes = PhClass::whereEnabled(true)->orderBy("minimum_age")->get();
        return jsonRes(true, "Classes", $classes,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function rollCalls(Request $request, PhClass $ph_class) {
        try {
            $request->validate(["year" => ["nullable","integer"]]);
            $year = $request->year ?? now()->year;
            $data = $ph_class->rollCalls()->where("date", ">=", $year."0101")
                ->where("date", "<=", $year."1231")->get();
            return jsonRes(true, "Roll Calls for the year $year",$data,200);
        } catch (ValidationException $exception){
            return jsonRes(false, $exception->validator->getMessageBag()->first(), $exception->errors(), 422);
        } catch (\Throwable $exception){
            return jsonRes(false, $exception->getMessage(),[],400);
        }
    }
    public function getCurrentChildren(Request $request, PhClass $ph_class) {
        try {
            $enrollments = $ph_class->enrollments()
                ->where("is_current", "=", true)
                ->with('child')->get();
            return jsonRes(true, "Current Enrollments", $enrollments,200);
        } catch (ValidationException $exception){
            return jsonRes(false, $exception->validator->getMessageBag()->first(), $exception->errors(), 422);
        } catch (\Throwable $exception){
            return jsonRes(false, $exception->getMessage(),[],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
}
