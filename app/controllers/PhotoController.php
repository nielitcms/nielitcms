<?php

class PhotoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($id)
	{
		$photos = Photo::where('album_id', '=',$id)
			->orderBy('created_at', 'desc')
			->paginate(2);
		$index = $photos->getCurrentPage() > 1? (($photos->getCurrentPage()-1) * $photos->getPerPage())+1 : 1;
		
		return View::make('photo.index')
			->with(array(
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
			return View::make('photo.create')
			->with(array('id'=>$id));
	}
	

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store($id)
	{
		$rules = array(
			'title'=> 'required',
			'photo_path' => 'required|mimes:' . Setting::getData('allowed_file_extension')
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('photo/add/'.$id)
				->withErrors($validation)
				->withInput(array(Input::get('title')));
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

		return Redirect::to('album')
			->with('message','File uploaded successfully');
	
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$photo = Photo::find($id);
		$photo_path = public_path() . '/' . $photo->photo_path;
		
		if(File::exists($photo_path))
			return Response::download($photo_path, $photo->title);
		else
			return View::make('album');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
		
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
		$photo = Photo::find($id);
		File::delete(public_path().'/'.$photo->photo_path);
		$photo->delete();
		
		return Redirect::to('album')->with('message', 'Photo deleted successfully.');
	
	}

}




