<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(array(
        	'username' => 'admin',
        	'display_name' => 'Administrator',
        	'password' => Hash::make('admin'),
        	'role' => 'administrator'
        	));
    }

}