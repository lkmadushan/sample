<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Role of the user
     *
     * @return mixed
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Given ratings by user
     *
     * @return mixed
     */
    public function givenRatings()
    {
        return $this->hasMany(Rating::class, 'author_id');
    }

    /**
     * Given reviews by user
     *
     * @return mixed
     */
    public function givenReviews()
    {
        return $this->hasMany(Review::class, 'author_id');
    }

    /**
     * Approved reviews by user
     *
     * @return mixed
     */
    public function approvedReviews()
    {
        return $this->hasMany(Review::class, 'approver_id');
    }

    /**
     * User created medias
     *
     * @return mixed
     */
    public function createdMedia()
    {
        return $this->hasMany(Media::class, 'author_id');
    }

    /**
     * User approved media
     *
     * @return mixed
     */
    public function approvedMedia()
    {
        return $this->hasMany(Media::class, 'approver_id');
    }
}
