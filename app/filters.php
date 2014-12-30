<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (!Sentry::check())
		return Redirect::guest('login');
});


Route::filter('admin', function()
{
	$user = Sentry::getUser();
	$admin = Sentry::findGroupByName('Admins');

	if(!$user->inGroup($admin))
		return Redirect::to('login');
});

Route::filter('standardUser', function() {
	$user = Sentry::getUser();
	$users = Sentry::findGroupByName('Users');

	if(!$user->inGroup($users)) return Redirect::to('login');
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() !== Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});

/*
|--------------------------------------------------------------------------
| Custom Filters
|--------------------------------------------------------------------------
*/

Route::filter('user', function($route,$request) {
	if(Sentry::check()) {
		// user is logged in
	} else {
		return Redirect::route('index')
			->with('error', 'You must be logged in');
	}
});

Route::filter('is_guest', function($route, $request) {
	if(!Sentry::check()) {
		// user is a guest user
	} else {
		return Redirect::route('index')
			->with('error', 'You are already logged in');
	}
});

Route::filter('access_check', function($route,$request) {
	if(Sentry::check()) {
		if(Sentry::getUser()->hasAccess($right)) {
			// logged in with authorized access rights
		} else {
			return Redirect::route('index')
				->with('error', 'Authorization denied');
		}
	}
});