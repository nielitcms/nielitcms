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
            'setting_key' => 'contact_us_email',
            'setting_title' => 'Contact Us Email Id',
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
            'setting_data' => '10',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'no_of_post',
            'setting_title' => 'No Of Post To Display in Homepage',
            'setting_data' => '10',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'footer_copyright_text',
            'setting_title' => 'Footer Copyright Text',
            'setting_data' => 'Copyright &copy; 2014, Nielit,Aizawl, Mizoram',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'banner_image',
            'setting_title' => 'Banner Image',
            'setting_data' => '0',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'sidebar_notice',
            'setting_title' => 'Notice Category',
            'setting_data' => '0',
            ));

        DB::table('settings')->insert(array(
            'setting_key' => 'comment_allowed_categories',
            'setting_title' => 'Comment Allowed Categories',
            'setting_data' => '',
            ));

    }

}