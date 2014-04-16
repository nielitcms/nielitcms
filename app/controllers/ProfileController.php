<?php

class ProfileController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$user = Auth::user();
		return View::make('profile.index')
			->with(array(
				'user' => $user
				));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user_id = Auth::user()->id;
		$rules = array(
			'username'=> 'required|alpha_dash|between:4,20|unique:users,username,'.$user_id,
			'display_name'=> 'required',
		);

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('profile')
				->withErrors($validation)
				->withInput(Input::all());
		}
	
		$user = User::find($user_id);
		$user->username = Input::get('username');
		$user->display_name = Input::get('display_name');
		$user->save();
		
		return Redirect::to('admin/profile')
			->with('message','Profile updated Successfully');
	}

	public function changepassword()
	{
		return View::make('profile.password');
	}

	public function storepassword()
	{
		$user_id = Auth::user()->id;
		$rules = array(
			'password'=>'required',
			'repeat_password'=> 'required|same:password'
		);

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('profile/change-password')
				->withErrors($validation);
		}

		$user=User::find($user_id);
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		return Redirect::to('profile/change-password')
			->with('message','Password updated successfully');
	}
}