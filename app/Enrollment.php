<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    protected $fillable = [
        'child_id',
        'ph_class_id',
        'enrollment_date',
        'graduation_date',

    ];


    protected $dates = [
        'enrollment_date',
        'graduation_date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/enrollments/'.$this->getKey());
    }
    public function child() {
        return $this->belongsTo(Child::class, "child_id");
    }
    public function phClass() {
        return $this->belongsTo(PhClass::class,"ph_class_id");
    }
    public function attendances() {
        return $this->hasMany(Attendance::class, "enrollment_id");
    }
}
