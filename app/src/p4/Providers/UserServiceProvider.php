<?php namespace p4\Providers;

// File: app/src/IDA/Providers/IdeaServiceProvider.php

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider
	 */
	public function register()
	{
		$this->app['p4'] = $this->app->share(function()
		{
			return new UserManager;
		});
	}
}
?>

