<?php

class UserSeeder extends DatabaseSeeder {

	public function run() {
		$users = [
			[
  				'first_name' => 'Ernest',
  				'last_name' => 'Hemingway',
  				'email' => 'ernest@hemingway.com',
  				'username' => 'ehemingway',
  				'password' => Hash::make('8r8gj54Lp$d'),
				]
			];

			foreach($users as $user) {
				User::create($user);
			}	
		
	}

}