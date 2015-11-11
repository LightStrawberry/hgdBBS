<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function nodes()
    {
    	return $this;
    }
}