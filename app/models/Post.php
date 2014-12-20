<?php

class Post extends \Eloquent {
	
	protected $table = 'posts';

	protected $guarded = [
		'id',
		'created_at',
		'updated_at',
		'deleted_at'
	];

	public function user()
	{
		return $this->belongsToMany('User')->withTimestamps();
	}
}
