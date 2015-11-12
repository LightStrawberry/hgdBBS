<?php

namespace App\Http\Controllers;

/* 我不知道为什么这里就不行 要用下面一句话 */
use Illuminate\Http\Request;
//use Request;
use Response;
use Auth;
use Input;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = User::all();
        return $a;
    }

    public function create()
    {
        return view('user');
    }

    public function checkout()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {  
            return redirect()->intended('/');
        }
        else
        {
            echo "error";
        }
    }

    public function login()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $input = request::all();
        User::create($input);
        return;
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        $topics = $user->topics;
        //$res = array_merge($user, $topics);
        return Response::json(
                    [
                        'success' => true,
                        'msg' => 200,
                        'data' => $user->toJson(),
                    ]
                );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        //dd($user);
        return view("user_update", compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //dd($request->all());
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->bio = $request->bio;

        $user->save();
        return redirect()->intended('/user/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
    }

    public function avatar()
    {
        return view('avatar');
    }

    public function avatarUpload()
    {
        $file = Input::file('image');
        $input = array('image' => $file);
        $rules = array(
            'image' => 'image'
        );
        $destinationPath = 'uploads/';
        $filename = Auth::user()->name."_avatar.jpg";
        $file->move($destinationPath, $filename);

        $user = Auth::user();
        $user->avatar_path = asset($destinationPath.$filename);
        $user->save();

        return Response::json(
                    [
                        'success' => true,
                        'avatar' => asset($destinationPath.$filename),
                    ]
                );
    }
}
