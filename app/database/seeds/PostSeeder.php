<?php

class PostSeeder extends DatabaseSeeder {

	public function run()
	{
		DB::table('posts')->delete();

		$post = new Post;
		$post->title = 'Test Post #1';
		$post->slug = 'test_post_1';
		$post->author_id = 1;
		$post->content = 
			'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer 
			feugiat feugiat vehicula. Nunc purus ligula, luctus in tempus sit 
			amet, varius in tortor. Fusce id sem malesuada augue tristique 
			sodales in non erat. Quisque porta sagittis neque, eu semper magna 
			sodales eu. Nam ac nisl nisi. Nullam ut nisi nec augue tempor 
			dignissim eget et erat. Morbi luctus euismod euismod. Pellentesque 
			euismod gravida quam. Ut sit amet arcu non lectus pharetra dapibus. 
			Aenean mollis luctus ipsum ut hendrerit. Sed non ullamcorper mauris. 
			Mauris ac turpis sit amet eros rutrum condimentum quis sit amet arcu. 
			Praesent a mauris in velit volutpat varius quis id magna.';
		$post->save();
	}
}