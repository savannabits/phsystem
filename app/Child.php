<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Savannabits\Media\HasMedia\HasMediaCollectionsTrait;
use Savannabits\Media\HasMedia\HasMediaThumbsTrait;
use Savannabits\Media\HasMedia\ProcessMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Child extends Model implements HasMedia
{
    use ProcessMediaTrait, HasMediaThumbsTrait, HasMediaCollectionsTrait, Searchable;
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
    protected $search = [
        'id',
        'first_name',
        'middle_names',
        'last_name',
        'bio',
        'gender',
        'dob',
        'school',
        'location',
    ];
    protected $casts = [
        "hobbies" => "array",
        "active" => "boolean"
    ];


    protected $dates = [
        'dob' => "Y-m-d",
        'enrollment_date' => "Y-m-d H:i:s",
        'created_at',
        'updated_at',
    ];

    protected $appends = ['resource_url','full_name', 'avatarUrl', 'avatarThumb','age'];

    /* ************************ ACCESSOR ************************* */

    public function getAgeAttribute() {
        if (!$this->dob) {return null;}
        return CarbonInterval::make(now()->diff( Carbon::parse($this->dob)))->years;
    }
    public function getFullNameAttribute() {
        return $this->first_name." ".($this->middle_names ? "$this->middle_names $this->last_name":"$this->last_name");
    }

    public function getResourceUrlAttribute()
    {
        return url('/children/'.$this->getKey());
    }
    public function getAvatarUrlAttribute() {
        /**@var Media $media*/
        $media = collect($this->getMedia('avatar'))->last();
        if($media)
            return $media->getFullUrl();
        return '';
    }
    public function getAvatarThumbAttribute() {
        /**@var Media $media*/
        $media = collect($this->getMedia('avatar'))->last();
        if($media)
            return $media->getFullUrl('thumb_200');
        return '';
    }
    public function registerMediaCollections() {
        $this->addMediaCollection('avatar')
            ->maxFilesize(5*1024*1024) // Set the file size limit
            ->singleFile()
            ->useDisk('public')
            ->accepts('image/*')
        ;
    }
    public function registerMediaConversions(Media $media = null)
    {
        $this->autoRegisterThumb200();
        $this->addMediaConversion('thumb_75')
            ->width(75)
            ->height(75)
            ->fit('crop', 75, 75)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();

        $this->addMediaConversion('thumb_150')
            ->width(150)
            ->height(150)
            ->fit('crop', 150, 150)
            ->optimize()
            ->performOnCollections('avatar')
            ->nonQueued();
    }
    /**
     * Auto register thumb overridden
     */
    public function autoRegisterThumb200()
    {
        $this->getMediaCollections()->filter->isImage()->each(function ($mediaCollection) {
            $this->addMediaConversion('thumb_200')
                ->width(200)
                ->height(200)
                ->fit('crop', 200, 200)
                ->optimize()
                ->performOnCollections($mediaCollection->getName())
                ->nonQueued();
        });
    }

    public function relatives() {
        return $this->hasMany(Relative::class, "child_id");
    }
    public function enrollments() {
        return $this->hasMany(Enrollment::class, "child_id");
    }
    public function phClasses() {
        return $this->belongsToMany(PhClass::class, "enrollments","child_id","ph_class_id");
    }
    public function currentEnrollment() {
        return $this->belongsTo(Enrollment::class, "current_enrollment_id","id");
    }
    public function toSearchableArray()
    {
        return array_merge(collect($this->only($this->search))->toArray(),[
            "hobbies"  => json_encode($this->hobbies)
        ]);
    }
}
