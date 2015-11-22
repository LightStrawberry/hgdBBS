<?php

namespace App\Http\Controllers;

/* 我不知道为什么这里就不行 要用下面一句话 */
use Illuminate\Http\Request;
//use Request;
use Response;
use Auth;
use Input;
use App\User;
use App\Like;
use App\Topic;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LikeController extends Controller
{
	// public function like(Request $request)
 //    {
 //        $id = $request->id;
 //        $like = Like::create(array_merge(['user_id' => \Auth::user()->id], ['topic_id' => $id]));
 //        //$like->tags()->attach($request->input(''));
 //        return redirect('topic/'.$id);
 //    }

    public function createOrDelete($id)
    {
        $topic = Topic::find($id);
        if (Like::isUserLikedTopic(Auth::user(), $topic)) {
            Auth::user()->likeTopics()->detach($topic->id);
        } else {
            Auth::user()->likeTopics()->attach($topic->id);
            //Notification::notify('topic_like', Auth::user(), $topic->user, $topic);
        }
        //Flash::success(lang('Operation succeeded.'));
        return redirect('topic/'.$id);
    }
}