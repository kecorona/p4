<?php

class PostSeeder extends DatabaseSeeder {

	public function run()
	{
		DB::table('posts')->delete();

		Post::create([
 
			'title' => 'Example Post',
			'content' => 'Hey this is just a test!'
			 
		]);	
	}
}