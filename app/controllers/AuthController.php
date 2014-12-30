<?php

class AuthController extends \BaseController {


	public function getSignup()
	{
		return View::make('pages.signup')->with('title', 'Sign Up');
	}
	
	public function getLogin()
	{
		return View::make('pages.login');
	}

	public function postLogin()
	{

		$validation = Validator::make(Input::all(), User::$login_rules);

		if($validation->fails()) {
			return Redirect::route('index')->withInput(Input::except('password'))
										   ->with('topError', $validation->errors()->first());
		} else {
			
			try{
				$credentials = [
					'email' => Input::get('email'),
					'password' => Input::get('password'),
				];

				$user = Sentry::authenticate($credentials, false);

				return Redirect::route('index')->with('success', 'Logged in');
			} catch(Cartalyst\Sentry\Users\LoginRequiredException $e) {
				return Redirect::route('index')->withInput(Input::except('password'))
											   ->with('topError', 'Login field is required');
			} catch(Cartalyst\Sentry\Users\PasswordRequiredException $e) {
				return Redirect::route('index')->withInput(Input::except('password'))
											   ->with('topError', 'Password field is required');
			} catch(Cartalyst\Sentry\Users\WrongPasswordException $e) {
				return Redirect::route('index');
			}
		if(Auth::attempt($credentials))
		{
			return "Logged in";
		}
		else
		{
			return Redirect::back()->with_input();
		}
	}

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('');
	}
	/**
	 * Display a listing of the resource.
	 * GET /auth
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /auth/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /auth
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /auth/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /auth/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}