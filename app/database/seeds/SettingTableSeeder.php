<?php
class SettingTableSeeder extends Seeder {

    public function run()
    {
        DB::table('settings')->truncate();

        DB::table('settings')->insert(array(
            'setting_key' => 'site_title',
            'setting_title' => 'Site Title',
            'setting_data' => 'NIELIT Aizawl',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'admin_site_title',
            'setting_title' => 'Administration Site Title',
        	'setting_data' => 'NIELIT CMS Administration',
        	));
    }

}