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

Route::get('/', function()
{
	$posts = Post::orderBy('created_at', 'DESC')->paginate(3);

	return View::make('index')->with('posts', $posts);
});
// Auth resources


Route::get('register', 'AuthController@getRegistration');
Route::post('register', 'AuthController@postRegistration');

Route::get('login', 'AuthController@getLogin');
Route::post('login', 'AuthController@postLogin');

Route::get('logout', 'UserController@getLogout');

Route::get('blog/{slug}', function($slug){
	$post = Post::where('slug', $slug)->first();

	$date = $post->created_at;
	setlocale(LC_TIME, 'America/New_York');
	$date = $date->formatlocalized('%A %d %B %Y');

	return View::make('posts.index')->with('post', $post)->with('date', $date);
});

Route::group(['before' => 'auth'], function(){

	Route::get('admin', 'AdminController@index');
	Route::get('logout', 'AuthController@logout');
	Route::resource('posts', 'PostController');

});

/*
Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'before' => 'user', 'uses' => 'AuthController@getLogout']);

Route::group(array('before' => 'auth'), function(){

    Route::get('admin.index', ['as'=>'admin', 'uses'=>'AdminController@index']);
    Route::get('pages.logout',['as' => 'logout', 'uses' => 'AuthController@getLogout']);
    Route::resource('posts', "PostController");







Route::group(array('prefix' => 'api', 'before' => 'auth.token'), function() {

      Route::get('/', function() {
        return "Protected resource";
      });

});
*/

