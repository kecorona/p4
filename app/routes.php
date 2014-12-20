<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
/*
/* Model Bindings */
Route::model('post', 'Post');
Route::model('comment', 'Comment');

Route::resource('/', 'IndexController');

/* User Routes */
Route::any('post.index', [
	'as' 	=>	'post.index',
	'uses'	=>	'PostController@indexAction'
]);

Route::get('/post/{post}/show', [
	'as' => 'post.show',
	'uses' => 'PostController@showPost'
]);
Route::post('/post/{post}/comment', [
	'as' => 'comment.create',
	'uses' => 'CommentController@createComment'
]);

/* Admin Routes */
Route::group(['prefix' => 'admin', 'before' => 'auth'], function() {
	// get routes
	Route::get('/admin/index', function()
	{
		$layout = View::make('layouts.master');
		$layout->title = 'Dashboard';
		$layout->main = View::make('admin.index')->with('content', 'Administrator Dashboard');
		return $layout;
	});

	

    Route::get('/post/create',
    	['as' => 'post.create',
    	'uses' => 'PostController@createPost'
    ]);

    Route::get('/post/{post}/edit',[
    	'as' => 'post.edit',
    	'uses' => 'PostController@editPost'
    ]);
    
    Route::get('/post/{post}/delete',[
    	'as' => 'post.delete',
    	'uses' => 'PostController@destroyPost'
    ]);
    
    Route::get('/comment/index',[
    	'as' => 'comment.index',
    	'uses' => 'CommentController@indexComment'
    ]);
    
    Route::get('/comment/{comment}/show',[
    	'as' => 'comment.show',
    	'uses' => 'CommentController@showComment'
    ]);
    
    Route::get('/comment/{comment}/delete',[
    	'as' => 'comment.delete',
    	'uses' => 'CommentController@destroyComment']);
 
    /*post routes*/
    Route::post('/post/save',[
    	'as' => 'post.save','uses' => 'PostController@storePost'
    ]);
    
    Route::post('/post/{post}/update',[
    	'as' => 'post.update',
    	'uses' => 'PostController@updatePost'
    ]);
    
    Route::post('/comment/{comment}/update',[
    	'as' => 'comment.update',
    	'uses' => 'CommentController@updateComment'
    ]);
 
});
 
/* Home routes */

Route::any('/login', [
	'as' => 'login',
	'uses' => 'IndexController@login'
]);

Route::get('admin', array('before' => 'auth', 'do' => function() {

}));

Route::delete('post/(:num)', array('before' => 'auth', 'do' => function($id){

})) ;

// When the new post is submitted we handle that here
Route::post('admin', array('before' => 'auth', 'do' => function() {

}));



Route::group(['before' => 'guest'], function() {
	$resources = Resource::where('secure', false)->get();

	foreach($resources as $resource)
	{
		Route::any($resource->pattern, [
			'as' => $resource->name,
			'uses' => $resource->target
		]);
	}
});

Route::group(['before' => 'auth'], function() {
	$resources = Resource::where('secure', true)->get();

	foreach($resources as $resource)
	{
		Route::any($resource->pattern, [
			'as' => $resource->name,
			'uses' => $resource->target
		]);
	}
});


