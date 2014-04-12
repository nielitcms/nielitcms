<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$photos = Photo::where('album_id', '=',$id)
			->orderBy('created_at', 'desc')
			->paginate(Setting::getData('no_of_item_perpage'));

		$album = Album::find($id);

		$index = $photos->getCurrentPage() > 1? (($photos->getCurrentPage()-1) * $photos->getPerPage())+1 : 1;
		
		return View::make('photo.index')
			->with(array(
				'album' => $album,
				'photos' => $photos,
				'index' => $index
				));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$album = Album::find($id);

		return View::make('photo.create')
			->with(array(
				'album' => $album
				));
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title'=> 'required',
			'photo_path' => 'required|image|max:10000');
		

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('/admin/photo/add/'.$id)
				->withErrors($validation)
				->withInput(array('title'=>Input::get('title')));
		}

		$file = Input::file('photo_path');
		$destinationPath = public_path() . '/photos';
		$fileName = uniqid() . '.' . $file->getClientOriginalExtension();
		$file->move($destinationPath, $fileName);
		
		$photo = new Photo;
		$photo->title = Input::get('title');
		$photo->album_id = $id;
		$photo->photo_path = 'photos/' . $fileName;
		$photo->save();

		return Redirect::to('/admin/album/photo/' . $id)
			->with('message','Photo uploaded successfully');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$photo = Photo::find($id);
		$photo_path = public_path() . '/' . $photo->photo_path;
		
		if(File::exists($photo_path))
			return Response::download($photo_path, $photo->title);
		else
			return View::make('/admin/album');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$photo=Photo::find($id);
		$album=Album::find($photo->album_id);
		return View::make('photo.edit')
			->with(
				array(
					'photo'=>$photo,
					'album'=>$album
					)
				);
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title'=> 'required',
			);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('/admin/photo/edit/'.$id)
				->withErrors($validation)
				->withInput(array(Input::get('title')));
		}
		
		$photo =Photo::find($id);
		$photo->title = Input::get('title');
		$photo->save();
		
		return Redirect::to('/admin/album/photo/' . $photo->album_id)
			->with('message','Photo edited successfully');
		}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');

		$page = Input::get('page');

		$photo = Photo::find($id);
		$albumid=$photo->album_id;
		$album=Album::find($albumid);
		$count=$album->photos->count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		File::delete(public_path().'/'.$photo->photo_path);
		$photo->delete();
		
		if($page)
			return Redirect::to('/admin/album/photo/' . $albumid . '?page=' . $page)->with('message', 'Photo deleted successfully.');
		else
			return Redirect::to('/admin/album/photo/' . $albumid)->with('message', 'Photo deleted successfully.');
	
	}

}
