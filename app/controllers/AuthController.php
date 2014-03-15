<?php
class AuthController extends BaseController
{
	public function login()
	{
		return View::make('auth.login');
	}

	public function authenticate()
	{
		$username = Input::get('username');
		$password = Input::get('password');

		if (Auth::attempt(array('username' => $username, 'password' => $password))) {
			return Redirect::intended('/admin');
		}
		else
			return Redirect::to('login')->with('message', 'Incorrect username or password');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
}