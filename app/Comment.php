<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $touches = array('topic');

	protected $fillable = ['content', 'number', 'topic_id', 'user_id'];  

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }
}
