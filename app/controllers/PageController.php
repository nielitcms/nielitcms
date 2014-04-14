<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
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
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		return View::make('page.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title' => 'required',
			'content' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/page/create')
				->withErrors($validator)
				->withInput(Input::all());

		$content = new Content();
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'page';
		$content->status = Input::get('status');
		$content->save();

		return Redirect::to('/admin/page')->with('message', 'Page created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$page = Content::with('author')
			->where('type', '=', 'page')
			->where('status', '=', 'published')
			->find($id);
		if(!$page)
			return Redirect::to('notfound');

		return View::make('page.show')
			->with(array(
				'page' => $page
				));
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
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title' => 'required',
			'content' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/page/edit/' . $id)
				->withErrors($validator)
				->withInput(Input::all());

		$content = Content::find($id);
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'page';
		$content->status = Input::get('status');
		$content->save();

		return Redirect::to('/admin/page')->with('message', 'Page updated successfully.');
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
		
		$count=Content::count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		Content::destroy($id);
		
		if($page)
			return Redirect::to('/admin/page/?page=' . $page)->with('message', 'Page deleted successfully.');
		else
			return Redirect::to('/admin/page/')->with('message', 'Page deleted successfully.');



	}
}