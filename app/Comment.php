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

    public function votes()
    {
        return $this->morphMany('App\Vote', 'votable');
    }

    public static function at($content)
    {
        if(preg_match("/@([^@]+?)([\s|:]|$)/is", $content, $matches))
            {
                //对$content进行处理 使@生成link存入数据库
                preg_match_all("/@([^@]+?)([\s|:]|$)/is", $content, $matches);
                $user = User::findByUsernameOrFail($matches[1][0]);

                $url = action('UserController@show', [$user->name]);
                $url = "<a href=\"".$url."\">@$user->name </a>";

                $content = str_replace($matches[0][0], $url, $content);
            }
        return $content;
    }
}
