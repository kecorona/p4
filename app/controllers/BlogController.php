<?php

class BlogController extends \BaseController {

	public function __construct()
	{
		$this->beforeFilter('guest', ['only' => ['getLogin']]);
		$this->beforeFilter('auth', ['only' => ['getLogout']]);
	}

	/**
	 * Display a listing of the resource.
	 * GET /blog
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = Post::orderBy('id', 'desc')->paginate(10);
		$posts->getEnvironment()->setViewName('pagination::simple');
		$this->layout->title = 'Home | WLA Blog';
		$this->layout->main = View::make('/')
					 ->nest('content', 'index', compact('posts'));
	}

	public function getSearch()
	{
		$searchTerm = Input::get('s');
		$posts = Post::whereRow('match(title,content) against(? in boolean mode)',[$searchTerm])
					 ->paginate(10);
		$posts->getEnvironment()->setViewName('pagination::slider');
		$posts->appends(['s'=>$searchTerm]);
		$this->layout->main = View::make('post.index')
					 ->nest('content', 'index', ($posts->isEmpty()) ? ['notFound' == true] : compact('posts'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /blog/create
	 *
	 * @return Response
	 */
	public function getLogin()
	{
		$this->layout->title='login';
		$this->layout->main = View::make('pages.login');
	}

	public function postLogin()
	{
		$credentials = [
			'username' => Input::get('username'),
			'password' => Input::get('password')
		];

		$rules = [
			'username' => 'required',
			'password' => 'required'
		];
		$validator = Validator::make($credentials, $rules);
		if($validator->passes())
		{
			if(Auth::attempt($credentials))
				return Redirect::to('admin.index');
			return Redirect::back()->withInput()->with('failure', 'username or password is invalid');
		}
		else
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::to('index');
	}

}