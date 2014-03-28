<?php
class Setting extends Eloquent
{
	protected $table = 'settings';

	public static function getData($setting_key)
	{
		$setting = Setting::where('setting_key', '=', $setting_key)->first();
		return $setting->setting_data;
	}

	public static function getTitle($setting_key)
	{
		$setting = Setting::where('setting_key', '=', $setting_key)->first();
		return $setting->setting_title;
	}
}