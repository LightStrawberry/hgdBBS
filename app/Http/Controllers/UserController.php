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
            return redirect('/');
        }
        else
        {
            return Response::json(
                        [
                            'status' => 1,
                            'message' => "账号或密码错误",
                        ]
                    );
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

    public function show($user)
    {
        //相比于第二种方式 在model中新增方法来得更优雅一些！
        $user = User::findByUsernameOrFail($user);
        //$info = User::findByUsernameOrFail('name', '=' ,$user)->get()->toArray()[0];
        //$num = $info['id'];
        //$topics = User::findOrFail($num)->topics;

        $tab = Input::get('tab');
        if($tab == 'publish')
        {
            $responses = $user->topics;
        }else if($tab == 'like')
        {
            $responses = $user->likeTopics;
        }else if($tab == 'response')
        {
            $responses = $user->comments;
        }else{
            $tab = 'recent';
            $responses = $user->topics;
        }
        return view('profile', compact('user', 'responses', 'tab'));
    }

    public function edit($user)
    {
        $user = User::findByUsernameOrFail($user);
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
        /*
        return Response::json(
                        [
                            'success' => true,
                            'message' => '修改成功',
                            'data' => $user->toJson(),
                        ]
                    );
        */
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()&&Auth::user()->id == $id)
        {
            $user = User::find($id);
            $user->delete();
            return Response::json(
                [
                    'success' => true,
                    'msg' => '删除',
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

    public function loginOnJson()
    {
        $email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) 
        {  
            return Response::json(
                        [
                            'status' => 0,
                            'message' => "登陆成功",
                        ]
                    );
        }
        else
        {
            return Response::json(
                        [
                            'status' => 1,
                            'message' => "账户或密码错误",
                        ]
                    );
        }
    }

    public function sendMail()
    {
        $email = "21828604@qq.com";
        $name = "lalala";
        $uid = 1;
        $code = 1;

        $data = ['email'=>$email, 'name'=>$name, 'uid'=>$uid, 'activationcode'=>$code];
        Mail::send('activemail', $data, function($message) use($data)
        {
            $message->to($data['email'], $data['name'])->subject('欢迎注册我们的网站，请激活您的账号！');
        });
    }

    public function likes($user)
    {
        $user = User::findByUsernameOrFail($user);
        $topics = $user->likeTopics()->paginate(10);
        dd($topics);
        //return View::make('users.favorites', compact('user', 'topics'));
    }

}
