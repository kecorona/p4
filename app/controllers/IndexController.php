<?php

class IndexController extends \BaseController {

	public function __construct()
	{
		if(Request::is(''))
		{
			$this->layout = 'layouts.master';
		}
	}

	public function index()
	{
		return View::make('index');
	}

	public function getProjects()
	{
		return View::make('pages.projects');
	}

	public function getLogin()
	{
		return View::make('pages.login');	
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

	
}