<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        User::create(array(
        	'username' => 'admin',
        	'display_name' => 'Administrator',
        	'password' => Hash::make('pass'),
        	'role' => 'administrator'
        	));
    }

}