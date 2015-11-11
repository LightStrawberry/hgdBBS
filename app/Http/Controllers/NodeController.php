<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Node;
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

    public function get_children()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($node)
    {
        $info = (array)DB::table('nodes')->where('node', $node)->first();
        $id = $info['id'];
        $topic = (array)DB::table('topics')->where('node_id', $id)->get();
        $data = array_merge($info, $topic);
        return $data;
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
