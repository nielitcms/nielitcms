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
		$redirect_to = Input::get('redirect_to');

		if (Auth::attempt(array('username' => $username, 'password' => $password, 'status'=> 'active', 'role'=>'administrator'))) 
			return Redirect::to('/admin');
		
		if (Auth::attempt(array('username' => $username, 'password' => $password, 'status'=> 'active', 'role'=>'editor'))) 
			return Redirect::to('/admin');

		if (Auth::attempt(array('username' => $username, 'password' => $password, 'status'=> 'active', 'role'=>'user'))) {
			if($redirect_to)
				return Redirect::to($redirect_to);
			else
				return Redirect::to('/');
		}
		else
			return Redirect::to('/')->with('message', 'Incorrect username or password');
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('login');
	}

	public function signout()
	{
		Auth::logout();
		return Redirect::to('/');
	}

	public function denied()
	{
		return View::make('auth.denied');
	}

	public function frontDenied()
	{
		return View::make('auth.front-denied');
	}

	public function frontNotfound()
	{
		return View::make('auth.front-notfound');
	}
}