<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
