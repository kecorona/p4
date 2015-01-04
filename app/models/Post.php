<?php

class Post extends \Eloquent {
	
	protected $table = 'posts';

	protected $guarded = [
		'id',
		'created_at',
		'updated_at'
	];

	protected $fillable = ['title', 'content'];

	public function getPost()
	{
		return $this->post;
	}

	public function Author()
	{
		return $this->belongsTo('User', 'author_id');
	}

}
