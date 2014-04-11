<?php

class MenuController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function index($menulocation)
	{
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');
	
		$menus = Menu::with('parent_menu')->where('position', '=',$menulocation)
			->orderBy('created_at', 'desc')
			->paginate(Setting::getData('no_of_item_perpage'));
			
		$index = $menus->getCurrentPage() > 1? (($menus->getCurrentPage()-1) * $menus->getPerPage())+1 : 1;
		
		return View::make('menu.index')
			->with(array(
				'menulocation'=>$menulocation,
				'menus' => $menus,
				'index' => $index,

				));
	}

	public function create($menulocation)
	{
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');

		$parent = array('0' => 'No Parent') + Menu::where('parent', '=', 0)->orderBy('title', 'asc')->get()->lists('title', 'id');
		return View::make('menu.create')
			->with(array(
				'menulocation'=>$menulocation,
				'parent'=>$parent
				));
			
	}

	public function store($menulocation)
	{
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');

		$rules = array(
			'title'=> 'required',
			'url'=>'required|url'
			
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('menu/create/'.$menulocation)
				->withErrors($validation)
				->withInput(array('title'=>Input::get('title'), 'url'=>Input::get('url')));
		}
		
		$menu = new Menu;
		$menu->title = Input::get('title');
		$menu->url = Input::get('url');
		$menu->parent = Input::get('parent');
		$menu->position = $menulocation;
		$menu->save();

		return Redirect::to('menu/list/' . $menulocation)
			->with('message','Menu Added successfully');
	}

	public function destroy($id)
	{
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');
		
		$menulocation=Menu::find($id)->position;
		Menu::destroy($id);
		return Redirect::to('menu/list/'.$menulocation)
			->with('message','Menu deleted successfully');		
	}

	public function edit($id)
	{ 
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');

		$parent = array('0' => 'No Parent') + Menu::where('parent', '=', 0)->orderBy('title', 'asc')->get()->lists('title', 'id');
		$menu=Menu::find($id);
		return View::make('menu.edit')
			->with(array(
				'menu'=>$menu,
				'parent'=>$parent
				));
	}

	public function update($id)
	{
		if(in_array(Auth::user()->role, array('editor')))
			return Redirect::to('denied');

		$rules=array(
			'title'=>'required',
			'url'=>'required'
			);	

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {

			return Redirect::to('menu/edit/'.$id)
			->withErrors($validation)
			->withInput(Input::all());
		}


		$menu = Menu::find($id);
		$menu->title = Input::get('title');
		$menu->url = Input::get('url');
		$menu->parent = Input::get('parent');
		$menu->save();

		return Redirect::to('menu/list/' .$menu->position)->with('message','Menu updated successfully');
	}



}