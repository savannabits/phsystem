<?php

namespace App\Http\Controllers\Api;

use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\RollCall\IndexRollCall;
use App\Http\Requests\Web\RollCall\StoreRollCall;
use App\RollCall;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RollCallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRollCall $request)
    {
        $data = SavbitsHelper::listing(RollCall::class, $request)->customQuery(function($q) {
            $q->with(['phClass']);
        })->process();
        return jsonRes(true, "Roll Calls", $data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRollCall $request)
    {
        $data = $request->getSanitized();
        $obj = json_decode(collect($data));
        $exists = RollCall::where("date", "=",
            Carbon::parse($data['date'])->isoFormat('YYYY-MM-DD'))
            ->where("ph_class_id","=", $obj->ph_class->id)->first();
        if ($exists) {
            return jsonRes(true, "A roll call for $obj->date exists",$exists,200);
        }
        $rollCall = new RollCall($data);
        $rollCall->phClass()->associate($obj->ph_class->id);
        $rollCall->creator()->associate(\Auth::id());
        $rollCall->saveOrFail();
        return jsonRes(true, "Roll Call created", $rollCall);
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
            $rollCall = RollCall::whereId($id)
                ->with(["phClass","creator",'attendances.enrollment.child','attendances.status'])
                ->firstOrFail();
            return jsonRes(true, "Roll call $id", $rollCall, 200);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(), [],400);
        }
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
