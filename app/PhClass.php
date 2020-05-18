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
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/ph-classes/'.$this->getKey());
    }
}
