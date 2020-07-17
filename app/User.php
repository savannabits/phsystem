<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Scout\Searchable;
use Savannabits\AdminAuth\Activation\Traits\CanActivate;
use Savannabits\AdminAuth\Notifications\ResetPassword;
use Savannabits\Media\HasMedia\HasMediaCollectionsTrait;
use Savannabits\Media\HasMedia\HasMediaThumbsTrait;
use Savannabits\Media\HasMedia\ProcessMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements HasMedia
{
    use CanActivate,HasRoles,HasApiTokens, Notifiable, Searchable;
    use HasMediaCollectionsTrait, ProcessMediaTrait, HasMediaThumbsTrait;
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'username',
        'first_name',
        'middle_name',
        'last_name',
        'gender',
        'dob'
    ];
    protected $searchable = [
        "id",
        'name',
        'email',
        'username',
        'first_name',
        'middle_name',
        'last_name',
    ];

    protected $hidden = [
        'password',
        'remember_token',

    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'last_login_at',
        'deleted_at',

    ];



    protected $appends = ['full_name', 'resource_url','avatar_url','avatar_thumb'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/users/'.$this->getKey());
    }

    public function getFullNameAttribute() {
        return "$this->first_name ". ($this->middle_name ? "$this->middle_name ": "")."$this->last_name";
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

    /**
     * Send the password reset notification.
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(app( ResetPassword::class, ['token' => $token]));
    }

    /* ************************ RELATIONS ************************ */

    public function relatives() {
        return $this->hasMany(Relative::class,"user_id");
    }
    public function children() {
        return $this->belongsToMany(Child::class, "relatives","user_id","child_id");
    }
    public function toSearchableArray()
    {
        return array_merge(collect($this->only($this->searchable))->toArray(),[

        ]);
    }
}
