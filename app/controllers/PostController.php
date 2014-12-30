<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /post/index
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$posts = Post::with('Author')->orderBy('id', 'DESC')->get();
		return View::make('index')->with('posts', $posts);
	}

	public function getAdmin()
	{
		return View::make('add_post');
	}

	public function addPost()
	{
		Post::create([
			'title' => Input::get('title'),
			'content' =>Input::get('content'),
			'author_id' => Auth::user()->id
		]);

		return Redirect::route('index');
	}

	/**
	 * Display the specified resource.
	 * GET /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showPost(Post $post)
	{
		$comments = $post->comments()->where('approved', '=', 1)->get();
		$this->layout->title = $post->title;
		$this->layout->main = View::make('post.index')->nest('content', 'post.show', compact('post', 'comments'));

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /post/create
	 *
	 * @return Response
	 */
	public function createPost()
	{
		$this->layout->title = 'Create New Post';
		$this->layout->main = View::make('post.create')->nest('content', 'post.create');
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /post/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function editPost(Post $post)
	{
		$this->layout->title = 'New Post';
		$this->layout->main = View::make('post.edit')->nest('content', 'post.edit', compact('post'));	
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroyPost(Post $post)
	{
		$post->delete();
		return Redirect::route('post.index')->with('success', 'Post successfully deleted');
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /post
	 *
	 * @return Response
	 */
	public function storePost()
	{
		$post = [
			'title' => Input::get('title'),
			'content' => Input::get('content'),
			'slug' => Input::get('slug')
		];
		$rules = [
			'title' => 'required',
			'content' => 'required'
		];
		$valid = Validator::make($data, $rules);
		if($valid->passes())
		{
			$post = new Post($post);
			$post = save();
			return Redirect::to('admin.index')->with('success', 'Post sucessfully saved');
		}
		else
		{
			return Redirect::back()->withErrors($valid)->withInput();
		}
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /post/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function updatePost(Post $post)
	{
		$data = [
			'title' => Input::get('title'),
			'content' => Input::get('content'),
			'slug' => Input::get('slug')
		];
		$rules = [
			'title' => 'required',
			'content' => 'required'
		];

		$valid = Validator::male($data, $rules);
		if($valid->passes())
		{
			$post->title = $data['title'];
			$post->content = $data['content'];
			$post->slug = $data['slug'];

			if(count($post->getDirty()) > 0)
			{
				$post->save();
				return Redirect::back()->with('success', 'Post successfully updated!');
			}
			else
                return Redirect::back()->with('success','Nothing to update!');
        }
        else
            return Redirect::back()->withErrors($valid)->withInput();
    }
 
}