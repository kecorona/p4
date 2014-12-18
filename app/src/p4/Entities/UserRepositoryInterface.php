<?php namespace p4\Entities;

interface UserRepositoryInterface {

	public function all();
}

class DbUserRepository implements UserRepositoryInterface {

	public function all()
	{
		return User::all()->toArray();
	}
}