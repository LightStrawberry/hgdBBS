<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;
use App\Topic;
use App\Node;
use Auth;
use Validator;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();
        //$roles = Topic::find(2)->tags;
        //dd($roles);
        return view("index",compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::lists('name', 'id');
        $nodes = Node::lists('name', 'id');

        return view("Topic",compact('tags', 'nodes'));
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
            'content' => 'required',
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
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
        return view('xx',compact('topic', 'current_id'));
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
        if(Auth::user()->id = $topic->id)
        {
            $topic = Topic::find($id);
            $topic->delete();
            return redirect('/');
        }
    }

    public function recent()
    {
        $topics = Topic::paginate(5);
        $topics->setPath('recent');
        return $topics->toJson();
    }
}
