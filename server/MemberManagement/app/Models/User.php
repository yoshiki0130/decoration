<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function prefecture()
    {
        return $this->belongsTo('App\Models\Prefecture');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Gender');
    }
}
