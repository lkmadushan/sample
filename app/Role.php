<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Users of the role
     *
     * @return mixed
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
