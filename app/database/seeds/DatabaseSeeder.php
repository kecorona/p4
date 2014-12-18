<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('ResourceSeeder');
		$this->command->info('User table seeded');

		$this->call('FollowerTableSeeder');
		$this->command->info('Follower table seeded');
	}

}
