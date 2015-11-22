<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
	protected $fillable = ['user_id', 'topic_id'];

	public $timestamps = false;

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\Topic');
    }

    public static function isUserLikedTopic(User $user, Topic $topic)
    {
        return Like::where('user_id', $user->id)
                        ->where('topic_id', $topic->id)
                        ->first();
    }
}