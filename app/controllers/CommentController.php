<?php

class CommentController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /comment/index
	 *
	 * @return Response
	 */
	public function indexComment()
	{
		$comments = Comment::orderBy('id', 'desc')->paginate(20);
		$this->layout->title = 'Comment Index';
		$this->layout->main = View::make('admin.index.dash')->nest('content', 'comment.index', compact('comments'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /comment/create
	 *
	 * @return Response
	 */
	public function createComment(Post $post)
	{
		$comment = [
			'author' => Input::get('author'),
			'email' => Input::get('email'),
			'comment' => Input::get('comment')
		];
		$rules = [
			'author' => 'required',
			'email' => 'required | email',
			'comment' => 'required'
		];
		$valid = Validator::make($comment, $rules);
		if($valid->passes())
		{
			$comment = new Comment($comment);
			$comment->approved = 'no';
			$post->comments()->save($comment);

			return Redirect::to(URL::previous(). '#reply')->with('success', 'Comment successfully submitted; pending approval');
		}
		else
		{
			return Redirect::to(URL::previous(). '#reply')->withErrors($valid)->withInput();
		}
	}

	/**
	 * Display the specified resource.
	 * GET /comment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showComment(Comment $comment)
	{
		if(Request::ajax())
			return View::make('comment.show', compact('comment'));
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /comment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyComment(Comment $comment)
	{
		$post = $comment->post;
		$status = $comment->approved;
		$comment->delete();
		return Redirect::back()->with('success', 'Comment successfully deleted');
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /comment/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Comment $comment)
	{
		$comment->approved = Input::get('status');
		$comment->save();
		$comment->post = Comment::where('post_id','=',$comment->post->id)->where('approved','=',1)->count();
		$comment->post->save();
		return Redirect::back()->with('success', 'Comment '. (($comment->approved === 'yes') ? 'Approved' : 'Disapproved'));
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /comment
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /comment/{id}
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
	 * GET /comment/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	

	

}