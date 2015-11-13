<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
	protected $hidden = array('created_at', 'updated_at', 'parent_id');

    public function topics()
    {
        return $this->hasMany('App\Topic');
    }

    public function nodes()
    {
    	return $this;
    }
}