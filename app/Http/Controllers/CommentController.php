<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Topic;
use App\User;
use App\Vote;
use App\Comment;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment = Comment::all();
        return $comment;
        //return view("index",compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $id = $request->topic_id;
        $v = Validator::make($request->all(), [
            'content' => 'required|min:8|max:255',
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }else
        {
            $content = $request->all()['content'];
            $content = strip_tags($content);
            $comment = Comment::create(array_merge(['user_id' => \Auth::user()->id], ['content' => $content] ,['topic_id' => $request->all()['topic_id']], ['number' => $request->all()['number']]));
            $topic = Topic::find($id);
            $topic->save();
            //$topic->tags()->attach($request->input('tag_list'));
            return redirect('/topic/'.$id);
        }
    }

    public function vote($id)
    {
        $comment = Comment::find($id);
        if (Auth::id() == $comment->user_id) {
            return 'Can not vote your feedback';
        }

        if ($comment->votes()->ByWhom(Auth::id())->WithType('upvote')->count()) {
            // click twice for remove upvote
            $comment->votes()->ByWhom(Auth::id())->WithType('upvote')->delete();
            $comment->decrement('vote_count', 1);
        } elseif ($comment->votes()->ByWhom(Auth::id())->WithType('downvote')->count()) {
            // user already clicked downvote once
            $comment->votes()->ByWhom(Auth::id())->WithType('downvote')->delete();
            $comment->votes()->create(['user_id' => Auth::id(), 'is' => 'upvote']);
            $comment->increment('vote_count', 2);
        } else {
            // first time click
            $comment->votes()->create(['user_id' => Auth::id(), 'is' => 'upvote']);
            $comment->increment('vote_count', 1);
            //Notification::notify('reply_upvote', Auth::user(), $reply->user, $reply->topic, $reply);
        }
        return redirect('/topic/'.$comment->topic->id);
    }

    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
