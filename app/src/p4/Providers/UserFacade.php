<?php namespace p4\Providers;

use Illuminate\Support\Facades\Facade;

class UserFacade extends Facade {

	protected static function getFacadeAccessor()
	{
		return 'users';
	}
}
?>