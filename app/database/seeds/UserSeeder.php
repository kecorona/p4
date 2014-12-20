<?php

class UserSeeder extends DatabaseSeeder {

	public function run() {

		DB::table('users')->delete();

		User::create([
			'first_name' => 'web',
			'last_name' => 'master',
			'email' => 'webmaster@wlakids.org',
			'username' => 'webmaster',
			'password' => Hash::make('password'),
		]);
		
	}

}