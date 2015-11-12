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

Route::get('/', 'HomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('topic', 'TopicController');
Route::resource('comment', 'CommentController');

Route::get('user', 'UserController@index');
Route::get('user/{id}', 'UserController@show');
Route::get('user/{id}/edit', 'UserController@edit');
Route::delete('user/{id}', 'UserController@destroy');
Route::put('user/update', 'UserController@update');
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'UserController@checkout');
//Route::post('user/login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

Route::get('/avatar/upload','UserController@avatar');
Route::post('/avatar/upload','UserController@avatarUpload');

Route::get('node', 'nodeController@index');
Route::get('node/{node}', 'nodeController@show');


Route::get('recent', 'TopicController@recent');
//Route::get('recent/{page}', 'TopicController@recent');