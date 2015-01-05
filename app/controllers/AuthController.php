<?php

class AuthController extends \BaseController {

	public function __construct() {
		parent::__construct();

		$this->beforeFilter('guest', ['only' => ['getLogin', 'getRegistration']]);
	}

	public function getRegistration()
	{
		return View::make('users.register');
	}

	public function postRegistration()
	{
		$input = Input::all();

		$validator = Validator::make($input, User::$rules);

		if($validator->passes())
		{
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->password = Hash::make(Input::get('password'));
			
			try {
				$user->save();
			} catch(Exception $e) {
				return Redirect::to('register')->withInput();
			}
		}
		return Redirect::to('register')->withInput();
									   ->withErrors($validator);
		
	}

	public function getLogin()
	{
		return View::make('users.login');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		];

		$validator = Validator::make($input, $rules);

		if($validator->passes())
		{
			$credentials = [
				'email' => Input::get('email'),
				'password' => Input::get('password')
			];

			if(Auth::attempt($credentials)) {
				return Redirect::to('admin');
			} else {
				return Redirect::to('login');
			}
		}
		return Redirect::to('login')->withErrors($validator);
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}