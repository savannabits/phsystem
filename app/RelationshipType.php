<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelationshipType extends Model
{
    protected $fillable = [
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
        return url('/relationship-types/'.$this->getKey());
    }
}
