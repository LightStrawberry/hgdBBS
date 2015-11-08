<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function topics()
    {
        return $this->belongsToMany('App\Topic');
    }
}
