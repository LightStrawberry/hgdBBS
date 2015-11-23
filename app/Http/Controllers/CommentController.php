<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Validator;
use App\Topic;
use App\User;
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
            if(preg_match("/@([^@]+?)([\s|:]|$)/is", $content, $matches))
            {
                //对$content进行处理 使@生成link存入数据库
                preg_match_all("/@([^@]+?)([\s|:]|$)/is", $content, $matches);
                $user = User::findByUsernameOrFail($matches[1][0]);

                $url = action('UserController@show', [$user->name]);
                $url = "<a href=\"".$url."\">@$user->name </a>";

                $content = str_replace($matches[0][0], $url, $content);
            }

            $comment = Comment::create(array_merge(['user_id' => \Auth::user()->id], ['content' => $content] ,['topic_id' => $request->all()['topic_id']], ['number' => $request->all()['number']]));
            $topic = Topic::find($id);
            $topic->save();
            //$topic->tags()->attach($request->input('tag_list'));
            return redirect('/topic/'.$id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
