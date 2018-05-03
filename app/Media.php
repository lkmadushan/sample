<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
     * Cast attributes
     *
     * @var array
     */
    protected $casts = [
        'tags' => 'array'
    ];

    /**
     * Author of the media
     *
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Approver of the media
     *
     * @return mixed
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    /**
     * Reviews of the media
     *
     * @return mixed
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Ratings of the media
     *
     * @return mixed
     */
    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
