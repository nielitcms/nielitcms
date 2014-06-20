<?php

class RegisterController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function contact()
	{
		return View::make('contact.contact');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('register.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'username'=> 'required|alpha_dash|min:3|unique:users,username',
			'display_name'=> 'required',
			'email'=>'email',
			'password'=> 'required',
			'repeat_password'=> 'required|same:password'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('register')
				->withErrors($validation)
				->withInput(Input::all());
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->display_name = Input::get('display_name');
		$user->email = Input::get('email');
		$user->role = 'user';
		$user->token = sha1(uniqid());
		$user->status = 'pending';
		$user->save();

		return Redirect::to('/')
			->with('message','User Created, Waiting for Approval');
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
		return View::make('register.create');
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
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