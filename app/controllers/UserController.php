<?php

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();

		$this->beforeFilter('guest', [
			'only' => ['getLogin', 'getRegistration']
		]);
	}

	public function getRegistration() {
		return View::make('users.register');
	}

	public function postRegistration() {
		$rules = [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('users.register')->with('message', 'Registration failed, please refer to the following errors:')
										 ->withInput()
										 ->withErrors($validator);
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		} catch(Exception $e) {
			return Redirect::to('users.register')->with('message', 'Registration failed')
											   ->withInput();
		}

		Auth::login($user);

		return Redirect::to('admin.index')->with('message', 'Welcome to Women Leaders in Action!');
	}
	
	public function getLogin()
	{
		return View::make('users.login');
	}

	public function postLogin()
	{
       $credentials = Input::only('email', 'password');

       if(Auth::attempt($credentials)) {
       		return Redirect::to('admin.index');
       } else {
       		return Redirect::to('users.login')->with('message', 'Login failed')
       									->withInput();
       }
    }

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}