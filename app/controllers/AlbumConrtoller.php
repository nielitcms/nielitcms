<?php

class AlbumController extends BaseController {

	public function index()
	{
		return View::make('album.create');
	}
	
	public function postCreate()
	{
		$rules = array(
			'title'=> 'required',
			'description'=> 'required');

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('album/create')->withErrors($validation);
		}

		$album = new Album;
		$album->title = Input::get('title');
		$album->description = Input::get('description');
		$album->save();
		
		return Redirect::to('album/create')->with('message','Album created successfully');
	}

	public function remove($id)
	{
		Album::destroy($id);
		return Redirect::to('album')->with('message','Album deleted successfully');
	}

	public function edit($id)
	{
		$album=Album::find($id);
		return View::make('album.edit')->with('album',$album);
	}
	public function desc($textarea)
	{
		Album::description($id)
	}


	public function postedit($id)
	{
		$rules=array(
			'title'=> 'required|alpha_dash|between:4,20|unique:albums,title,' .$id);
		$validation= Validator::make(Input::all(), $rules);
		if($validation ->fails()){
			return Redirect::to('album/edit/'. $id)->withErrors($validation);
		}
		$albums=Album::find($id);
		$albums->title = Input::get('title');
		$albums->save();
		return Redirect::to('album')->with('message', 'Album Edit successfully');
	}
}
?>