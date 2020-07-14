<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'ph_class_id',
        'facilitator_id',
        'lesson_date',
        'start_time',
        'end_time',
        'objective',
        'activities',
        'biblical_passage',
        'homework',
        'enabled',
    
    ];
    
    
    protected $dates = [
        'lesson_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/lessons/'.$this->getKey());
    }
}
