<?php

class PhotoController extends BaseController {

	public function index()
	{
		return View::make('photo.create');
	}
	
	public function postCreate()
	{
		$rules = array(
			'title'=> 'required',
			'photo_path'=> 'required');

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('photo/create')->withErrors($validation);
		}

		$photo = new Album;
		$photo->title = Input::get('title');
		$photo->photo_path = Input::get('photo_path');
		$photo->save();
		
		return Redirect::to('photo/create')->with('message','Photo created successfully');
	}

	public function remove($id)
	{
		Photo::destroy($id);
		return Redirect::to('photo')->with('message','Photo deleted successfully');
	}

	public function edit($id)
	{
		$photo=Photo::find($id);
		return View::make('photo.edit')->with('photo',$photo);
	}
	
	public function postedit($id)
	{
		$rules=array(
			'title'=> 'required|alpha_dash|between:4,20|unique:albums,title,' .$id);
		$validation= Validator::make(Input::all(), $rules);
		if($validation ->fails()){
			return Redirect::to('photo/edit/'. $id)->withErrors($validation);
		}
		$photos=Album::find($id);
		$photos->title = Input::get('title');
		$photos->photo_path = Input::get('photo_path');
		$photos->save();
		return Redirect::to('photo')->with('message', 'Photo Edit successfully');
	}
}
?>