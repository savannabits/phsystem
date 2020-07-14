<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'enrollment_id',
        'roll_call_id',
        'attendance_status_id',
        'comment',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/attendances/'.$this->getKey());
    }
    public function enrollment() {
        return $this->belongsTo(Enrollment::class, "enrollment_id");
    }
    public function rollCall() {
        return $this->belongsTo(RollCall::class, "roll_call_id");
    }
    public function status() {
        return $this->belongsTo(AttendanceStatus::class, "attendance_status_id");
    }
}
