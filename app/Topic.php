<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
	protected $fillable = ['title', 'content', 'published_at', 'user_id'];

	//protected $hidden = array('user_id', 'node_id');

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function node()
    {
        return $this->belongsTo('App\Node');
    }
}
