<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

	protected $fillable = ['title', 'content', 'published_at', 'user_id'];

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
