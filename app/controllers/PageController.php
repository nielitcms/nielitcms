<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pages = Content::with('author')
			->where('type','=','page')
			->orderBy('created_at', 'desc')
			->paginate(Setting::getData('no_of_item_perpage'));

		$index = $pages->getCurrentPage() > 1? (($pages->getCurrentPage()-1) * $pages->getPerPage())+1 : 1;

		return View::make('page.index')->with(array(
			'pages' => $pages,
			'index' => $index
			));	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = array(
			'title' => 'required',
			'content' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('page/create')
				->withErrors($validator)
				->withInput(Input::all());

		$content = new Content();
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'page';
		$content->status = Input::get('status');
		$content->save();

		return Redirect::to('page')->with('message', 'Page created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$page = Content::with('author')->find($id);
		return View::make('page.edit')
			->with(array(
				'page' => $page
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
			'title' => 'required',
			'content' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('page/edit/' . $id)
				->withErrors($validator)
				->withInput(Input::all());

		$content = Content::find($id);
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'page';
		$content->status = Input::get('status');
		$content->save();

		return Redirect::to('page')->with('message', 'Page updated successfully.');
	}			
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Content::destroy($id);
		return Redirect::to('page')->with('message','Page deleted Successfully');
	}

}