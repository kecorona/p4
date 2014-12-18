<?php

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Empty previous records
		DB::table('users')->delete();

		User::create(array('username' => 'username1','email' => 'foo1@bar.com', 'password' => Hash::make('secret'), 'first_name' => 'User1',
			'last_name' => 'One'));
		User::create(array('username' => 'username2','email' => 'foo2@bar.com', 'password' => Hash::make('secret'), 'first_name' => 'User2',
			'last_name' => 'Two'));
		User::create(array('username' => 'username3','email' => 'foo3@bar.com', 'password' => Hash::make('secret'), 'first_name' => 'User3',
			'last_name' => 'Three'));
		User::create(array('username' => 'username4','email' => 'foo4@bar.com', 'password' => Hash::make('secret'), 'first_name' => 'User4',
			'last_name' => 'Four'));
	}
}