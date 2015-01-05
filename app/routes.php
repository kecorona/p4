<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/classes', function() {
	echo Paste\Pre::render(get_declared_classes(),'');
});

Route::resource('posts', 'PostController');

Route::resource('users', 'AuthController');

Route::get('/', function()
{
	$posts = Post::orderBy('created_at', 'DESC')->paginate(3);

	return View::make('posts.index')->with('posts', $posts);
});
// Auth resources


Route::get('register',
[	
	'as'	=> 'register', 
	'uses'	=> 'AuthController@getRegistration'
]);

Route::post('register',
[	
	'as'	=> 'register',
	'uses'	=> 'AuthController@postRegistration'
]);

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');

Route::get('logout', 'AuthController@getLogout');

Route::get('posts.{slug}', function($slug){

	$post = Post::where('slug', $slug)->first();

	return View::make('/')->with('post', $post);
});

Route::group(['prefix' => 'admin'], function(){
	
	Route::any('admin', 'AdminController@index');
	
	Route::controller('posts', 'PostController');

	
	
});

