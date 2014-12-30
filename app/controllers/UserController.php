<?php

class UserController extends \BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->filter('before', 'auth');
	}

	public function loginAction()
	{
		Auth::attempt([
			'email' => Input::get('email'),
			'password' => Input::get('password')
		]);

		return Redirect::route('create_post');
		/*if($this->isPostRequest()) {
			$validator = $this->getLoginValidator();

			if($validator->passes()) {
				$credentials = $this->getLoginCredentials();

				if(Auth::attempt($credentials)) {
					return Redirect::route('admin.index');
				}

				return Redirect::back()->withErrors ([
					'password' => ['Credentials invalid.']
				]);
			} else {
				return Redirect::back()
					->withInput()
					->withErrors($validator);
			}
			return View::make('pages.login');*/		
	}

	protected function isPostRequest()
	{
		return Input::server("REQUEST_METHOD") == "POST";
	}

	protected function getLoginValidator() 
	{
		return Validator::make(Input::all(), [
			'username' => 'required',
			'password' => 'required'
		]);
	}

	protected function getLoginCredentials()
	{
		return [
		'username' => Input::get('username'),
		'password' => Input::get('password')
		];
	}

	public function request()
	{
		if($this->isPostRequest()) {
			$response = $this->getPasswordRemindResponse();

			if($this->isInvalidUser($response)) {
				return Redirect::back()
					->withInput()
					->with('status', Lang::get($response));
			}

			return Redirect::back()
				->with('status', Lang::get($response));
		}

		return View::make('users.request');
	}

	protected function getPasswordRemindResponse()
	{
		return Password::remind(Input::only('email'));
	}

	protected function isInvalidUser($response)
	{
		return $response === Password::INVALID_USER;
	}

	public function reset($token)
	{
		if($this->isPostRequest()) {
			$credentials = Input::only(
				'email',
				'password',
				'password_confirmation'
			) + compact('token');

			$response = $this->resetPassword($credentials);

			if($response === Password::PASSWORD_RESET) {
				return Redirect::route('users.profile');
			}

			return Redirect::back()
				->withInput()
				->with('error', Lang::get($response));
		}

		return View::make('users.reset', compact('token'));
	}

	protected function resetPassword($credentials)
	{
		return Password::reset($credentials, function($user, $pass) {
			$user->password = Hash::make($pass);
			$user->save();
		});
	}

	public function logout()
	{
		Auth::logout();

		return Redirect::route('pages.login');
	}
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = $this->users->all();

		return View::make('users.index', compact('index'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)
								   ->withInput()
								   ->with('message', 'There were validation errors.');
		}

		User::create($data);

		return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::find($id);

		return View::make('users.show')->with('user', $user);
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);
		if(is_null($user)) {
			return Redirect::route('users.index');
		}

		return View::make('users.edit', compact('users'));
	}

	/**
	 * Update the specified user in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)
								   ->withInput()
								   ->with('message', 'There were validation errors.');
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified user from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}
