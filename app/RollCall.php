<?php

namespace App;

use Carbon\Carbon;
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

    protected $appends = ['resource_url', "start", "end", "title",'is_marked'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/roll-calls/'.$this->getKey());
    }
    public function getStartAttribute() {
        return Carbon::parse($this->date)->toDateString();
    }
    public function getIsMarkedAttribute() {
        return $this->attendances()->count();
    }
    public function getEndAttribute() {
        return Carbon::parse($this->date)->toDateString();
    }
    public function getTitleAttribute() {
        return Carbon::parse($this->date)->toDateString()." Attendance";
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

