<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceStatus extends Model
{
    protected $fillable = [
        'code',
        'name',
        'description',
        'enabled',

    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/attendance-statuses/'.$this->getKey());
    }
    public function attendances() {
        return $this->hasMany(Attendance::class,"attendance_status_id");
    }
}
