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
        return $node;
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
        //dd($request->all());
        $name = $request->all()['name'];
        $node_url = $request->all()['node_url'];
        $description = $request->all()['description'];
        $parent_id = $request->all()['parent_id'];
        Node::firstOrCreate(array_merge(['name' => $name], ['node_url' => $node_url], ['description' => $description], ['parent_id' => $parent_id]));
        return redirect('/dashboard');
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
    public function edit($node_url)
    {
        $node = Node::findByNodeUrlOrFail($node_url);
        return view("admin/node_edit", compact('node'));
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
        $node = Node::find($id);

        $node->name = $request->all()['name'];
        $node->node_url = $request->all()['node_url'];
        $node->description = $request->all()['description'];
        $node->parent_id = $request->all()['parent_id'];

        $node->save();

        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $node = Node::find($id);
        $node->delete();
        return redirect('/dashboard');
    }
}
