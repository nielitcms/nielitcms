<?php

class DownloadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$downloads = Download::with('creator')
			->orderBy('created_at', 'desc')
			->paginate(2);

		$index = $downloads->getCurrentPage() > 1? (($downloads->getCurrentPage()-1) * $downloads->getPerPage())+1 : 1;
		
		return View::make('download.index')
			->with(array(
				'downloads' => $downloads,
				'index' => $index
				));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('download.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title'=> 'required',
			'file_path' => 'required|mimes:' . Setting::getData('allowed_file_extension'),
			'status'=> 'required'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('download/create')
				->withErrors($validation)
				->withInput(array(Input::get('title'), Input::get('status')));
		}

		$file = Input::file('file_path');
		$destinationPath = public_path() . '/downloads';
		$fileName = uniqid() . '.' . $file->getClientOriginalExtension();
		$file->move($destinationPath, $fileName);
		
		$download = new Download;
		$download->title = Input::get('title');
		$download->created_by = Auth::user()->id;
		$download->status = Input::get('status');
		$download->file_path = 'downloads/' . $fileName;
		$download->save();

		return Redirect::to('download')
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
		$download = Download::find($id);
		$file_path = public_path() . '/' . $download->file_path;
		
		if(File::exists($file_path))
			return Response::download($file_path, $download->title);
		else
			return View::make('download.show');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$download = Download::with('creator')->find($id);
		return View::make('download.edit')
			->with(array(
				'download' => $download
				));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = array(
			'title'=> 'required',
			'file_path' => 'mimes:' . Setting::getData('allowed_file_extension'),
			'status'=> 'required'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('download/edit/' . $id)
				->withErrors($validation)
				->withInput(array(Input::get('title'), Input::get('status')));
		}

		if(Input::hasFile('file_path')) {
			$file = Input::file('file_path');
			$destinationPath = public_path() . '/downloads';
			$fileName = uniqid() . '.' . $file->getClientOriginalExtension();
			$file->move($destinationPath, $fileName);
		}
		
		$download = Download::find($id);
		$download->title = Input::get('title');
		$download->created_by = Auth::user()->id;
		$download->status = Input::get('status');
		
		if(Input::hasFile('file_path')) {
			$download->file_path = 'downloads/' . $fileName;
		}
		
		$download->save();

		return Redirect::to('download')
			->with('message','File updated successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$download = Download::find($id);
		File::delete(public_path().'/'.$download->file_path);
		$download->delete();
		
		return Redirect::to('download')->with('message', 'Download deleted successfully.');
	}

	public function album()
	{
		return View::make('album.create');
	}
	
}