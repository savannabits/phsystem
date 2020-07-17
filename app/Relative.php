<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Relative extends Model
{
    use Searchable;
    protected $fillable = [
        'user_id',
        'child_id',
        'relationship_type_id',
        'custom_relationship',

    ];
    protected $searchable = [
        "id",
        "custom_relationship"
    ];


    protected $dates = [
        'created_at',
        'updated_at',

    ];

    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/relatives/'.$this->getKey());
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function child() {
        return $this->belongsTo(Child::class, "child_id");
    }
    public function relationshipType() {
        return $this->belongsTo(RelationshipType::class, "relationship_type_id");
    }

    public function toSearchableArray()
    {
        return array_merge(collect($this->only($this->searchable))->toArray(),[
            "child" => $this->child->first_name." ".$this->child->middle_names." ".$this->child->last_name,
            "user" => $this->user->name,
            "user_email" => $this->user->email
        ]);
    }
}
