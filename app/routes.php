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


Route::any('', [
	'as' 	=>	'www.index.index',
	'uses'	=>	'IndexController@indexAction'
]);
Route::any('users.login', [
	'as' => 'users.login',
	'uses' => 'UserController@login'
]);

Route::any('users.profile', [
	'as' => 'users.profile',
	'uses' => 'UserController@profile'
]);
Route::any('users.create', [
	'as' => 'users.create',
	'uses' => 'UserController@create'
]);

Route::any('users.request', [
	'as' => 'users.request',
	'uses' => 'UserController@request'
	]);

Route::any('users.reset.{token}', [
	'as' => 'users.reset',
	'uses' => 'UserController@reset'
	]);



Route::any('users.logout', [
	'as'	=>	'users.logout',
	'uses'	=>	'UserController@logout'
	]);

Route::any('group.index', [
	'as'	=>	'group.index',
	'uses'	=>	'GroupController@indexAction'
]);

Route::any('group.delete', [
	'as' => 'group.delete',
	'uses' => 'GroupController@deleteAction'
]);



Route::group([
	'domain' => 'dev.p4.kristincorona.com'
], function() {
	Route::any('/about', function() {
		return "Client facing website.";
	});
});

Route::group([
	'domain' => 'dev.admin.p4.kristincorona.com'
], function() {
	Route::any('/about', function() {
		return "Admin facing website.";
	});
});

Route::group([
	'domain' => 'dev.{sub}.kristincorona.com'
], function () {
	Route::any('/whoami', function($sub) {
		return "You are in the '" . $sub . "' sub-domain.";
	});
});

Route::group([
	'domain' => 'dev.{sub}.{sub1}.kristincorona.com'
], function() {
	Route::any('/whoami', function($sub, $sub1) {
		return "You are in the '" . $sub . $sub1 . "' sub-domain.";
	});
});
