<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Response;
use App\Node;
use App\Topic;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class NodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $node = Node::all();

        return $node;
        //$roles = Topic::find(2)->tags;
        //dd($roles);
        //return view("header",compact('topics'));
    }

    public function main_node()
    {
        //这里不对 因为DB出来的东西不是Eloquent 而toArray is a model method of Eloquent
        //$node = DB::table('nodes')->where('parent_id', 0)->toArray();

        $node = Node::where('parent_id', '=' ,0)->get()->toArray();
        //var_dump($node);
        return Response::json(
                        [
                            'msg' => 200,
                            'success' => true,
                            'data' => $node,
                        ]
                    );
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
        $node = Request::all()->toJson();
        return $node;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($node)
    {
        //$info = (array)DB::table('nodes')->where('node_url', $node)->first();
        $info = Node::where('node_url', '=' , $node)->get()->toArray();
        $id = $info[0]['id'];
        //$topic = (array)DB::table('topics')->where('node_id', $id)->get();
        $topic = Topic::where('node_id', '=' , $id)->get()->toJson();
        //$data = array_merge_recursive($info, $topic);
        return Response::json(
                        [
                            'msg' => 200,
                            'success' => true,
                            'data' => [
                                'node' => json_encode($info),
                                'topics' => $topic,
                            ],
                        ]
                    );
        //return view('xx',compact('topic'));
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
