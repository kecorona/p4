<?php

class UserController extends BaseController {

	public function __construct() {
		parent::__construct();

		$this->beforeFilter('guest', [
			'only' => ['getLogin', 'getSignup']
		]);
	}

	public function getSignup() {
		return View::make('pages.signup');
	}

	public function postSignup() {
		$rules = [
			'email' => 'required|email|unique:users,email',
			'password' => 'required|min:6'
		];

		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails()) {
			return Redirect::to('pages.signup')->with('message', 'Registration failed, please refer to the following errors:')
										 ->withInput()
										 ->withErrors($validator);
		}

		$user = new User;
		$user->email = Input::get('email');
		$user->password = Hash::make(Input::get('password'));

		try {
			$user->save();
		} catch(Exception $e) {
			return Redirect::to('pages.signup')->with('message', 'Registration failed')
											   ->withInput();
		}

		Auth::login($user);

		return Redirect::to('admin.index')->with('message', 'Welcome to Women Leaders in Action!');
	}
	
	public function getLogin()
	{
		return View::make('pages.login');
	}

	public function postLogin()
	{
       $credentials = [
       		'email' => Input::get('email'),
       		'password' => Input::get('password'
       	)];

       if(Auth::attempt($credentials)) {
       		return Redirect::to('admin.index');
       } else {
       		return Redirect::to('login')->with('message', 'Login failed');
       									->withInput();
       }
    }

	public function getLogout()
	{
		Auth::logout();

		return Redirect::to('/');
	}
}