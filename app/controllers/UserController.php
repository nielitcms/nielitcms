<?php

class UserController extends BaseController {

	public function index()
	{
		return View::make('user.index');
	}

	public function receiveUser()
	{
		exit('User post here');
	}

}