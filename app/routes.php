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

Route::any('/', array('as' => 'index', 'uses' => 'PostController@getIndex'));
// Auth resources


Route::get('pages.signup', 'UserController@getSignup');
Route::post('pages.signup', 'UserController@postSignup');

Route::get('login', 'UserController@getLogin');
Route::post('login', 'UserController@postLogin');

Route::get('logout', 'UserController@getLogout');



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

