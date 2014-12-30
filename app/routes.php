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

# User Routes
Route::get('create', function()
{
    $user = Sentry::register([
        'email'     => 'kvonnegut@wearsunscreen.com',
        'password'  => Hash::make('secret'),
        'first_name'=> 'Kurt',
        'last_name' => 'Vonnegut',
    ]);

    return 'Admin User created (ID#: '.$user->id;
});

// Auth resources
Route::get('login', ['as'=>'login', 'uses'=>'AuthController@getLogin']);
Route::post('login', ['as' => 'login', 'uses' => 'AuthController@postLogin']);
Route::get('logout', ['as' => 'logout', 'before' => 'user', 'uses' => 'AuthController@getLogout']);

// Blog resources
Route::get('/', array('as' => 'index', 'uses' => 'PostController@getIndex'));


Route::group(array('prefix' => 'api', 'before' => 'auth.token'), function() {

      Route::get('/', function() {
        return "Protected resource";
      });

});
