<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /**
     * Author of the rating
     *
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Media of the rating
     *
     * @return mixed
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
