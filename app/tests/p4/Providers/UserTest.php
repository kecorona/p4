<?php

use p4\Providers\UserManager;

public function testIndexActionBindUsersFromRepository()
{
	// Arrange
	$repository = Mockery::mock('UserRepositoryInterface');
	$repository->shouldReceive('all')->once()->andReturn(array('foo'));
	App::instance('UserRepositoryInterface', $repository);

	// Act
	$response = $this->action('GET', 'UserController@getIndex');

	// Assert
	$this->assertResponseOk();
	$this->assertViewHas('users', array('foo'));
}