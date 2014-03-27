<?php

class UserController extends BaseController {

	public function index()
	{
		$users = user::paginate(2);

		$index = $users->getCurrentPage() > 1? (($users->getCurrentPage()-1) * $users->getPerPage())+1 : 1;
		return View::make('user.index')
			->with(array(
				'users' => $users,
				'index' => $index
				));
	}

	public function receiveUser()
	{
		exit('User post here');
	}

	public function create()
	{
		return View::make('user.create');
	}

	public function createUser()
	{
		$rules = array(
			'username'=> 'required|alpha_dash|between:4,8|unique:users,username',
			'display_name'=> 'required',
			'password'=> 'required',
			'repeat_password'=> 'required|same:password',
			'role'=> 'required'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('user/create')
				->withErrors($validation)
				->withInput(Input::all());
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->display_name = Input::get('display_name');
		$user->role = Input::get('role');
		$user->save();

		return Redirect::to('user')
			->with('message','User Created Successfully');
	}

	public function remove($id)
	{
		
		User::destroy($id);
		return Redirect::to('user')
			->with('message','User deleted Successfully');
	}

	public function edit($id)
	{
		$user=User::find($id);
		return View::make('user.edit')
			->with('user',$user);
	}

	public function postEdit($id)
	{
		$rules = array(
			'username'=> 'required|alpha_dash|between:4,20|unique:users,username,'.$id,
			'display_name'=> 'required',
			'role'=>'required'
		);

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('user/edit/'. $id)
				->withErrors($validation)
				->withInput(Input::all());
		}
	
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->display_name = Input::get('display_name');
		$user->role = Input::get('role');
		$user->save();
		
		return Redirect::to('user')
			->with('message','User Edit Successfully');
	}

	public function ChangePassword($id)
	{
		$user=User::find($id);
		return View::make('user.changepassword')->with('user',$user);
	}

	public function PostChangePassword($id)
	{	
		$rules = array(
			'password'=>'required',
			'repeat_password'=> 'required|same:password'
		);

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('user/changepassword/'. $id)
				->withErrors($validation);
		}

		$user=User::find($id);
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		return Redirect::to('user')
			->with('message','User password updated successfully');
	}
}
