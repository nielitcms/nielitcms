<?php

class AlbumController extends \BaseController {

	// /**
	//  * Display a listing of the resource.
	//  *
	//  * @return Response
	//  */
	public function index()
	{

		$albums= Album::with('creator', 'photos')
			->orderBy('created_at', 'desc')
			->paginate(2);

		$index = $albums->getCurrentPage() > 1? (($albums->getCurrentPage()-1) * $albums->getPerPage())+1 : 1;
		return View::make('album.index')
			->with(array(
				'albums' => $albums,
				'index' => $index
				));
	}

	// /**
	//  * Show the form for creating a new resource.
	//  *
	//  * @return Response
	//  */
	public function create()
	{
		return View::make('album.create');
	}
	
// 	public function postcreate()
// 	{
// 		$rules = array(
// 			'title'=>'required|unique:albums,title');
// 		$validation=Validator::make(input::all(), $rules);

// 		if($validation ->fails()){
// 			return Redirect::to('album/create')->withErrors($validation);
// 		}

// 		$album = new Album;
// 		$albums->title = Input::get('title');
// 		$albums->description = Input::get('description');
// 		$save->save();
		
// 		return Redirect::to('album/create')->with('message', 'Album create successfully');
// 	}

	
// 	/**
// 	 * Store a newly created resource in storage.
// 	 *
// 	 * @return Response
// 	 */


	public function store()
	{

		$rules = array(
			'title'=>'required',
			'description'=>'required');


		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()){
			return Redirect::to('album/create')
			->withErrors($validation)
			->withInput(Input::all());
		}
	
		$album = new Album;
		$album->title = Input::get('title');
		$album->description = Input::get('description');
		$album->created_by = Auth::User()->id;
		$album->save();

		return Redirect::to('photo/add/' . $album->id)->with('message','Album created successfully');
	}

	
// 	* Show the form for editing the specified resource.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 	 */
	public function edit($id)
	{
		$album=Album::find($id);
		return View::make('album.edit')
			->with('album',$album);
	}


// 	/**      * Update the specified resource in storage.      *      * @param
// int  $id      * @return Response      */     
	public function update($id)
	{
		$rules=array(
			'title'=>'required',
			'description'=>'required');	

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {

			return Redirect::to('album/edit/'.$id)
			->withErrors($validation)
			->withInput(Input::all());
		}


		$album = Album::find($id);
		$album->title = Input::get('title');
		$album->description = Input::get('description');
		$album->created_by = Auth::User()->id;
		$album->save();

		return Redirect::to('album')->with('message','Album updated successfully');
	}



// 	/**
// 	 * Remove the specified resource from storage.
// 	 *
// 	 * @param  int  $id
// 	 * @return Response
// 		 */
	public function destroy($id)
	{		
		Album::destroy($id);
		return Redirect::to('album')
			->with('message','Album deleted successfully');		
	}

}

