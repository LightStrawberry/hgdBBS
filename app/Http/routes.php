<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'TopicController@index');

Route::get('home', 'HomeController@index');

Route::resource('topic', 'TopicController');
Route::resource('comment', 'CommentController');

Route::get('user', 'UserController@index');
Route::get('member/{name}', 'UserController@show');
Route::get('member/{name}/edit', 'UserController@edit');
Route::get('member/{name}/like', 'UserController@likes');
Route::delete('user/{id}', 'UserController@destroy');
Route::put('user/update', 'UserController@update');
Route::get('user/mail', 'UserController@sendMail');
Route::get('test', 'TopicController@test');
Route::get('admin', 'AdminController@login');
Route::post('admin', 'AdminController@check');
Route::get('dashboard', 'AdminController@index');

Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'UserController@checkout');
Route::get('Account/LogOnForJson', 'UserController@loginOnJson');
//Route::post('user/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/avatar/upload','UserController@avatar');
Route::post('/avatar/upload','UserController@avatarUpload');

Route::get('node', 'nodeController@index');
Route::get('main_node', 'nodeController@main_node');
Route::get('node/{node}', 'nodeController@show');
Route::get('node/{node}/edit', 'nodeController@edit');
Route::put('node/{node}', 'nodeController@update');
Route::delete('node/{node}', 'nodeController@destroy');
Route::post('node', 'nodeController@store');


Route::get('recent', 'TopicController@recent');


Route::get('like/{id}', 'LikeController@createOrDelete');

Route::get('comment/vote/{id}', 'CommentController@vote');

