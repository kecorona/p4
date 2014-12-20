<?php

class ResourceSeeder extends DatabaseSeeder {

	public function run()
	{
		$resources = [
			[
				'pattern'	=>	'login',
				'name'		=>	'login',
				'target'	=>	'IndexController@login',
				'secure'	=>	false
			],
			[
				'pattern'	=>	'request',
				'name'		=>	'users.request',
				'target'	=>	'UserController@requestAction',
				'secure'	=>	false
			],
			[
				'pattern'	=>	'reset',
				'name'		=>	'users.reset',
				'target'	=>	'UserController@resetAction',
				'secure'	=>	false
			],
			[
				'pattern'	=>	'logout',
				'name'		=>	'pages.logout',
				'target'	=>	'IndexController@logout',
				'secure'	=>	true
			],

			[
				'pattern'	=>	'post.index',
				'name'		=>	'post.index',
				'target'	=>	'PostController@indexPost',
				'secure'	=>	true
			],
			[
				'pattern'	=>	'post.create',
				'name'		=>	'post.create',
				'target'	=>	'PostController@createPost',
				'secure'	=>	true
			],
			[
				'pattern'	=>	'post.edit',
				'name'		=>	'post.edit',
				'target'	=>	'PostController@editPost',
				'secure'	=>	true
			],
			[
				'pattern'	=>	'post.delete',
				'name'		=>	'post.delete',
				'target'	=>	'GroupController@deletePost',
				'secure'	=>	true
			]
		];

		foreach($resources as $resource)
		{
			Resource::create($resource);
		}


	}
}