<?php


class UserSeeder extends DatabaseSeeder {

public function run()
{
    DB::table('users')->delete();

    $user = new User;
    $user->email = 'admin@admin.com';
    $user->password = Hash::make('password');
    $user->first_name = 'Admin';
    $user->last_name = 'User';
    $user->save();

    }

}