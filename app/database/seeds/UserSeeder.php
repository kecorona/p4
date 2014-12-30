<?php

class UserSeeder extends DatabaseSeeder {

	public function run() {

		DB::table('users')->delete();

		User::create([
			'first_name' => 'Kurt',
			'last_name' => 'Vonnegut',
			'email' => 'kvonnegut@wearsunscreen.com',
			'username' => 'kvonnegut',
			'password' => Hash::make('user'),
		]);
		
	}

}