<?php
class Setting extends Eloquent
{
	protected $table = 'settings';
	public $timestamps = false;

	public static function getData($setting_key)
	{
		$setting = Setting::where('setting_key', '=', $setting_key)->first();
		return $setting?$setting->setting_data:null;
	}

	public static function getTitle($setting_key)
	{
		$setting = Setting::where('setting_key', '=', $setting_key)->first();
		return $setting?$setting->setting_title:null;
	}
}