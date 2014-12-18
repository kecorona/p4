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

Route::group(['before' => 'guest'], function() {
	$resources = Resource::where('secure', false)->get();

	foreach($resources as $resource)
	{
		Route::any($resource->pattern, [
			'as' => $resource->name,
			'uses' => $resource->target
		]);
	}
});

Route::group(['before' => 'auth'], function() {
	$resources = Resource::where('secure', true)->get();

	foreach($resources as $resource)
	{
		Route::any($resource->pattern, [
			'as' => $resoure->name,
			'uses' => $resource->target
		]);
	}
});

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
