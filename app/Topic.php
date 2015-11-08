<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

	protected $fillable = array('title', 'content');

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
