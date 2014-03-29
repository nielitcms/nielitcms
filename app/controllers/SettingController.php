<?php

class SettingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('setting.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'site_title' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/settings')
				->withErrors($validator)
				->withInput(Input::all());

		$site_title = Input::get('site_title');
		Setting::where('setting_key', '=', 'site_title')
			->update(array('setting_data'=>$site_title));

		$admin_site_title = Input::get('admin_site_title');
		Setting::where('setting_key', '=', 'admin_site_title')
			->update(array('setting_data'=>$admin_site_title));

		$allowed_file_extension = Input::get('allowed_file_extension');
		Setting::where('setting_key', '=', 'allowed_file_extension')
			->update(array('setting_data'=>$allowed_file_extension));

		return Redirect::to('/settings')->with('message', 'Settings updated succesfully');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}