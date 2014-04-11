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

        DB::table('settings')->insert(array(
            'setting_key' => 'allowed_file_extension',
            'setting_title' => 'Allowed File Extension',
        	'setting_data' => 'jpg,jpeg,bmp,gif,png,pdf,docx,doc,xls,xlsx,txt',
        	));

        DB::table('settings')->insert(array(
            'setting_key' => 'no_of_item_perpage',
            'setting_title' => 'No Of Item Per Page',
            'setting_data' => '1',
            ));

    }

}