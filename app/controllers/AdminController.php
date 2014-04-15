<?php
class AdminController extends BaseController
{
	public function getIndex()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
	
		return View::make('admin.index');
	}
}