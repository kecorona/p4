<?php

class BlogController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /index
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = Post::orderBy('created_at', 'DESC')->paginate(10);
		
		return View::make('admin.blog.index', compact('posts'));
	}

	public function getCreate()
	{
		return View::make('admin.blog.create');
	}

	public function postCreate()
	{
		$rules = [
			'title' => 'required|min:3',
			'content' =>'required|min:5'
		];

		$validator = $validator::make(Input::all(), $rules);

		if($validator->fails())
		{
			return Redirect::back() ->withInput()
									->withErrors($validator);
		}

		$post = new Post;

		$post->title 	= e(Input::get('title'));
		$post->content	= e(Input::get('content'));
		$post->user_id	= Sentry::getId();

		if($post->save())
		{
			return Redurect::to('admin.blog.$post->id.edit')->with('success');
		}

		return Redirect::to('admin.blog.$post->id.edit')->with('success');
	}
}
