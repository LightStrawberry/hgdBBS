<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Topic;
use App\Node;
use Auth;
use Input;
use App\User;
use Validator;
use Response;
use App\Comment;
use App\Http\Requests;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tab = Input::get('tab');
        if(!isset($tab))
        {
            $tab = 'recent';
        }
        $id = Node::where('node_url', '=' , $tab)->get()->toArray()[0]['id'];

        $topics = Topic::where('node_id', '=' , $id)->orderBy('updated_at', 'desc')->paginate(10);
        $nodes = Node::where('parent_id', '=', $id)->get();
        $user = Auth::check();
        $tabs = Node::main_node();

        return view("index",compact('topics', 'nodes', 'user', 'tabs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        $nodes = Node::where('parent_id', '!=', 0)->get()->lists('name', 'id');

        return view("topic_new",compact('tags', 'nodes'));
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
        $input['title'] = mb_substr($request->get('content'),0,64);
        $v = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'content' => 'required|min:8',
            'node' => 'required',
            'tag_list' => 'required',
        ]);
        if ($v->fails())
        {
            //return redirect()->back()->withErrors($v->errors());
            return $v->errors()->toJson();
        }else{
            $topic = Topic::create(array_merge(['user_id' => \Auth::user()->id], $request->all()));
            $topic->tags()->attach($request->input('tag_list'));
            return redirect('/');
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
        $topic = Topic::find($id);
        //$comments = Topic::comments()->id;
        //return $topic->toJson();
        if(Auth::check())
        {
            $current_id = Auth::user()->id;
        }else{
            $current_id = 0;
        }
        return view('topic',compact('topic', 'current_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $topic = Topic::find($id);
        if(Auth::check()&&Auth::user()->id = $topic->user_id)
        {
            $topic = Topic::find($id);
            $topic->delete();
            return Response::json(
                [
                    'success' => true,
                    'msg' => '删除成功',
                ]
            );
        }
        return Response::json(
                [
                    'success' => false,
                    'msg' => 'error',
                ]
            );
    }

    public function recent()
    {
        $topics = Topic::paginate(10);
        $topics->setPath('recent');
        //return $topics->toJson();
        return Response::json(
                [
                    'success' => true,
                    'msg' => 200,
                    'data' => $topics->toJson(),
                ]
            );
    }
}
