<?php

namespace App\Http\Controllers\Api;

use App\Attendance;
use App\Helpers\SavbitsHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\Attendance\IndexAttendance;
use App\Http\Requests\Web\Attendance\StoreAttendance;
use App\Http\Requests\Web\Attendance\UpdateAttendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexAttendance $request)
    {
        $data = SavbitsHelper::listing(Attendance::class, $request)
            ->customQuery(function($q) {
                $q->with(['enrollment.child','rollCall.phClass',"status"]);
            })->process();
        ;
        return jsonRes(true, "Attendance records", $data,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreAttendance $request)
    {
        $data = $request->getSanitized();
        $obj = json_decode(collect($data));
        $attendance = Attendance::whereRollCallId($obj->roll_call_id)
            ->where("enrollment_id", "=",$obj->enrollment_id)->first();
        if (!$attendance) {
            $attendance = new Attendance($data);
            $attendance->rollCall()->associate($obj->roll_call_id);
            $attendance->enrollment()->associate($obj->enrollment_id);
        }
        $attendance->status()->associate($obj->attendance_status_id);
        $attendance->saveOrFail();
        return jsonRes(true, "Attendance marked", $attendance);
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateAttendance $request, $id)
    {
        try {
            $data = json_decode(collect($request->getSanitized()));
            $attendance = Attendance::findOrFail($id);
            $attendance->status()->associate($data->status->id);
            return jsonRes(true, "attendance updated", $attendance, 200);
        } catch (\Throwable $exception) {
            \Log::error($exception);
            return jsonRes(false, $exception->getMessage(),[],500);
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
}
