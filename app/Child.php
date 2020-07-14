<?php

namespace App;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Database\Eloquent\Model;
use Savannabits\Media\HasMedia\HasMediaCollectionsTrait;
use Savannabits\Media\HasMedia\HasMediaThumbsTrait;
use Savannabits\Media\HasMedia\ProcessMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class Child extends Model implements HasMedia
{
    use ProcessMediaTrait, HasMediaThumbsTrait, HasMediaCollectionsTrait;
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

    protected $appends = ['resource_url', 'avatarUrl', 'avatarThumb','age'];

    /* ************************ ACCESSOR ************************* */

    public function getAgeAttribute() {
        if (!$this->dob) {return null;}
        return CarbonInterval::make(now()->diff( Carbon::parse($this->dob)))->years;
    }
    public function getResourceUrlAttribute()
    {
        return url('/children/'.$this->getKey());
    }
    public function getAvatarUrlAttribute() {
        /**@var Media $media*/
        $media = collect($this->getMedia('avatar'))->last();
        if($media)
            return url($media->getUrl());
        return '';
    }
    public function getAvatarThumbAttribute() {
        /**@var Media $media*/
        $media = collect($this->getMedia('avatar'))->last();
        if($media)
            return $media->getUrl('thumb_200');
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
}
