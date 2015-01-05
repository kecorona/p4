<?php

class PostController extends \BaseController {

	public function __construct() {
		parent::__construct();

		$this->beforeFilter('auth');
	}
	/**
	 * Display a listing of the resource.
	 * GET /post/index
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DESC');
        return View::make('admin.posts.index')->with('posts', $posts);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, Post::$rules);

		if($validator->passes()) {

			$post = new Post;
			$post->title = Input::get('title');
			$post->slug = Str::slug(Input::get('title'));
			$post->content = Input::get('content');
			$post->live = Input::get('live');
			$post->author_id = Auth::user()->id;
			$post->save();

			return Redirect::route('admin.posts.index');
		}
		return Redirect::back()->withErrors($validator)
							   ->withInput();
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);

		$date = $post->created_at;
		setlocale(LC_TIME, 'America/New_York');
		$date = $date->formatlocalized('%A %d %B %Y');

		return View::make('admin.posts.show')->with('post', $post)
											 ->with('date', $date);
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET admin/posts/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);

		if(!is_null($post))
			return View::make('admin.posts.edit')->with('post', $post);
		return Redirect::route('admin.posts.index');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');

		$validator = Validator::make($input, Post::$rules);

		if($validator->passes()) {
			Post::find($id)->update($input);
			return Redirect::route('admin.posts.index');
		}
		return Redirect::back()->withErrors($validator);
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();

		return Redirect::route('admin.posts.index')->with('success', 'Post deleted');
	}
}
