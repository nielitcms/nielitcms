<?php

class SettingController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$albums = Album::orderBy('title', 'asc')->get()->lists('title', 'id');
		$albums = array(0 => 'No Banner') + $albums;
		$categories = Category::orderBy('name', 'asc')->get()->lists('name', 'id');
		$categories = array(0 => 'No Category') + $categories;

		return View::make('setting.index')
			->with(array(
				'albums' => $albums,
				'categories' => $categories
				));
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
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$rules = array(
			'site_title' => 'required',
			'admin_site_title' => 'required',
			'contact_us_email' => 'required|email',
			'allowed_file_extension'=> 'required',
			'no_of_item_perpage'=> 'required|integer|min:1',
			'no_of_post'=> 'required|integer|min:1',
			'footer_copyright_text'=> 'required',
			'banner_image' => 'required',
			'sidebar_notice' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/settings')
				->withErrors($validator)
				->withInput(Input::all());

		$site_title = Input::get('site_title');
		Setting::where('setting_key', '=', 'site_title')
			->update(array('setting_data'=>$site_title));

		$admin_site_title = Input::get('admin_site_title');
		Setting::where('setting_key', '=', 'admin_site_title')
			->update(array('setting_data'=>$admin_site_title));

		$contact_us_email = Input::get('contact_us_email');
		Setting::where('setting_key', '=', 'contact_us_email')
			->update(array('setting_data'=>$contact_us_email));

		$allowed_file_extension = Input::get('allowed_file_extension');
		Setting::where('setting_key', '=', 'allowed_file_extension')
			->update(array('setting_data'=>$allowed_file_extension));

		$no_of_item_perpage = Input::get('no_of_item_perpage');
		Setting::where('setting_key', '=', 'no_of_item_perpage')
			->update(array('setting_data'=>$no_of_item_perpage));

		$no_of_post = Input::get('no_of_post');
		Setting::where('setting_key', '=', 'no_of_post')
			->update(array('setting_data'=>$no_of_post));

		$footer_copyright_text = Input::get('footer_copyright_text');
		Setting::where('setting_key', '=', 'footer_copyright_text')
			->update(array('setting_data'=>$footer_copyright_text));

		$banner_image = Input::get('banner_image');
		Setting::where('setting_key', '=', 'banner_image')
			->update(array('setting_data'=>$banner_image));

		$sidebar_notice = Input::get('sidebar_notice');
		Setting::where('setting_key', '=', 'sidebar_notice')
			->update(array('setting_data'=>$sidebar_notice));

		$comment_allowed_categories = Input::get('comment_allowed_categories');
		Setting::where('setting_key', '=', 'comment_allowed_categories')
			->update(array('setting_data'=>serialize($comment_allowed_categories)));

		return Redirect::to('/admin/settings')->with('message', 'Settings updated succesfully');
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