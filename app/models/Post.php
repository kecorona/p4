<?php

class Post extends \Eloquent {
	
	protected $table = 'posts';

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
		'deleted_at'
	];

	protected $fillable = ['title', 'content'];

	public function Author()
	{
		return $this->belongsTo('User', 'author_id');
	}
}
