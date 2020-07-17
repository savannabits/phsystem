<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhClass extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'minimum_age',
        'maximum_age',
        'description',
        'enabled',

    ];
    protected $hidden = [
        "current_enrollments"
    ];
    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url','current_enrollments'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/ph-classes/'.$this->getKey());
    }
    public function getCurrentEnrollmentsAttribute() {
        return $this->enrollments()->where("is_current", "=", true)->with(['child'])->get();
    }
    public function enrollments() {
        return $this->hasMany(Enrollment::class, "ph_class_id");
    }
    public function children() {
        return $this->belongsToMany(Child::class, "enrollments","ph_class_id","child_id");
    }
    public function rollCalls() {
        return $this->hasMany(RollCall::class);
    }
}
