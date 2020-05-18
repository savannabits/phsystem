<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Child extends Model
{
    protected $fillable = [
        'first_name',
        'middle_names',
        'last_name',
        'bio',
        'gender',
        'dob',
        'school',
        'hobbies',
        'location',
        'active',
        'enrollment_date',
    
    ];
    
    
    protected $dates = [
        'dob',
        'enrollment_date',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/children/'.$this->getKey());
    }
}
