<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RollCall extends Model
{
    protected $fillable = [
        'date',
        'ph_class_id',
        'created_by',
        'description',

    ];


    protected $dates = [
        'date',
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/roll-calls/'.$this->getKey());
    }
    public function phClass() {
        return $this->belongsTo(PhClass::class, "ph_class_id");
    }
    public function creator() {
        return $this->belongsTo(User::class, "created_by");
    }
    public function attendances() {
        return $this->hasMany(Attendance::class, "roll_call_id");
    }
}

