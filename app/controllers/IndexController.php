<?php

class IndexController extends \BaseController {

	public function __construct() {
		parent::__construct();
	}
	/**
	 * Display a listing of the resource -- user view.
	 * GET /post/index
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Post::orderBy('created_at', 'DESC')->paginate(3);
        return View::make('posts.index')->with('posts', $posts);

	}