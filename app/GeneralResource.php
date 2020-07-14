<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralResource extends Model
{
    protected $fillable = [
        'title',
        'description',
        'published_at',
        'enabled',
        'uploaded_by',
    
    ];
    
    
    protected $dates = [
        'published_at',
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/general-resources/'.$this->getKey());
    }
}
