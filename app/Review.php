<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * Author of the review
     *
     * @return mixed
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    /**
     * Approver of the review
     *
     * @return mixed
     */
    public function approver()
    {
        return $this->belongsTo(User::class, 'approver_id');
    }

    /**
     * Media of the review
     *
     * @return mixed
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}
