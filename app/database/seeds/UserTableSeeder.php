<?php
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->truncate();

        DB::table('users')->insert(array(
        	'username' => 'rema',
        	'display_name' => 'Administrator',
        	'password' => Hash::make('rema'),
        	'role' => 'administrator'
        	));
    }

}