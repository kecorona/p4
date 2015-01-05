<?php

class Post extends Eloquent {
	
	protected $table = 'posts';

	protected $guarded = [
		'id',
		'created_at',
		'updated_at'
	];

	public static $rules = [
		'title' => 'required|unique:posts',
		'content' => 'required'
	];

	public function user()
	{
		return $this->belongsTo('User', 'user_id');
	}

}
