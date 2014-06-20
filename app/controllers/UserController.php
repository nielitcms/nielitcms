<?php

class UserController extends BaseController {

	public function index()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$users = user::where('status', '!=', 'pending')->paginate(Setting::getData('no_of_item_perpage'));

		$index = $users->getCurrentPage() > 1? (($users->getCurrentPage()-1) * $users->getPerPage())+1 : 1;
		return View::make('user.index')
			->with(array(
				'users' => $users,
				'index' => $index
				));
	}

	public function receiveUser()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		exit('User post here');
	}

	public function create()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		return View::make('user.create');
	}

	public function createUser()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$rules = array(
			'username'=> 'required|alpha_dash|min:3|unique:users,username',
			'display_name'=> 'required',
			'email'=>'email',
			'password'=> 'required',
			'repeat_password'=> 'required|same:password',
			'role'=> 'required',
			'status'=> 'required'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('/admin/user/create')
				->withErrors($validation)
				->withInput(Input::all());
		}

		$user = new User;
		$user->username = Input::get('username');
		$user->password = Hash::make(Input::get('password'));
		$user->display_name = Input::get('display_name');
		$user->email = Input::get('email');
		$user->role = Input::get('role');
		$user->token = sha1(uniqid());
		$user->status = Input::get('status');
		$user->save();

		return Redirect::to('/admin/user')
			->with('message','User Created Successfully');
	}

	public function remove($id)
	{
		if(in_array(Auth::user()->role, array('user')))
		return Redirect::to('denied');

		$page = Input::get('page');
		
		$count=User::count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		User::destroy($id);
		
		if($page)
			return Redirect::to('/admin/user/?page=' . $page)->with('message', 'User deleted successfully.');
		else
			return Redirect::to('/admin/user/')->with('message', 'User deleted successfully.');



	}

	public function edit($id)
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$user=User::find($id);
		return View::make('user.edit')
			->with('user',$user);
	}

	public function postEdit($id)
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$rules = array(
			'username'=> 'required|alpha_dash|min:3|unique:users,username,'.$id,
			'display_name'=> 'required',
			'email'=>'email',
			'role'=>'required',
			'status'=>'required'
		);

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('/admin/user/edit/'. $id)
				->withErrors($validation)
				->withInput(Input::all());
		}
	
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->display_name = Input::get('display_name');
		$user->email = Input::get('email');
		$user->role = Input::get('role');
		$user->status = Input::get('status');
		$user->save();
		
		return Redirect::to('/admin/user')
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
			return Redirect::to('/admin/user/changepassword/'. $id)
				->withErrors($validation);
		}

		$user=User::find($id);
		$user->password = Hash::make(Input::get('password'));
		$user->save();
		
		return Redirect::to('/admin/user')
			->with('message','User password updated successfully');
	}

	public function ForgetPassword()
	{
		return View::make('user.forgetpassword');
	}

	public function PostForgetPassword()
	{
		$email=Input::get('email');
		$user=User::where('email', '=', $email)->get();

		if ($user->count()) {
			$user=$user->first();
			$token=sha1(uniqid());
			$user->token=$token;
			if($user->save()){
				$link='/admin/resetpassword/'.$token;
				return View::make('user.link')
					->with(array('url'=>$link));
				}}

		return Redirect::to('/admin/forgetpassword')
				->with('message', 'Email does not exis');
	}

	public function ResetPassword($token)
	{
		return View::make('user.resetpassword')
				->with(array('token'=>$token));
	}

	public function savePassword($token)
	{	
		$rules = array(
			'password'=>'required',
			'repeat_password'=> 'required|same:password'
			);

		$validation= Validator::make(Input::all(), $rules);
		if ($validation ->fails()) {
			return Redirect::to('/admin/resetpassword/'.$token)
				->withErrors($validation);
		}
		
		$user=User::where('token', '=', $token);
		if($user->count()){
			$user=$user->first();
			$user->password = Hash::make(Input::get('password'));
			$user->token='';
			$user->save();
		
		return Redirect::to('/login')
			->with('message','User password updated successfully');
		}
	}

	public function PendingUser()
	{
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');

		$users = user::where('status', '=', 'pending')->paginate(Setting::getData('no_of_item_perpage'));

		$index = $users->getCurrentPage() > 1? (($users->getCurrentPage()-1) * $users->getPerPage())+1 : 1;
		return View::make('user.pendinguser')
			->with(array(
				'users' => $users,
				'index' => $index
				));
	}
}
