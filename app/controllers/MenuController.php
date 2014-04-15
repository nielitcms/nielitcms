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
		if(in_array(Auth::user()->role, array('editor','user')))
			return Redirect::to('denied');
	
		$menus = Menu::with('parent_menu')->where('position', '=',$menulocation)
			->orderBy('title', 'asc')
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
		if(in_array(Auth::user()->role, array('editor', 'user')))
			return Redirect::to('denied');

		$parent = Menu::where('parent', '=', 0)
			->where('position', '=', $menulocation)
			->orderBy('title', 'asc')
			->get()
			->lists('title', 'id');

		$parent = array('0' => 'No Parent') + $parent;
		
		return View::make('menu.create')
			->with(array(
				'menulocation'=>$menulocation,
				'parent'=>$parent
				));
			
	}

	public function store($menulocation)
	{
		if(in_array(Auth::user()->role, array('editor', 'user')))
			return Redirect::to('denied');

		$rules = array(
			'title'=> 'required',
			'url'=>'required|url',
			'display_order'=>'required|numeric|min:1'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('admin/menu/create/'.$menulocation)
				->withErrors($validation)
				->withInput(array('title'=>Input::get('title'), 'url'=>Input::get('url')));
		}
		
		$menu = new Menu;
		$menu->title = Input::get('title');
		$menu->url = Input::get('url');
		$menu->parent = Input::get('parent', 0);
		$menu->display_order = Input::get('display_order');
		$menu->position = $menulocation;
		$menu->save();

		return Redirect::to('admin/menu/list/' . $menulocation)
			->with('message','Menu added successfully');
	}

	public function destroy($id)
	{
		if(in_array(Auth::user()->role, array('user')))
		return Redirect::to('denied');

		$page = Input::get('page');
		
		$count=Menu::count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		$menulocation=Menu::find($id)->position;
		Menu::destroy($id);
		
		if($page)
			return Redirect::to('admin/menu/list/'.$menulocation.'?page=' . $page)->with('message', 'Menu deleted successfully.');
		else
			return Redirect::to('admin/menu/list/'.$menulocation)->with('message', 'Menu deleted successfully.');





	}

	public function edit($id)
	{ 
		if(in_array(Auth::user()->role, array('editor', 'user')))
			return Redirect::to('denied');

		$menu=Menu::find($id);

		$parent = Menu::where('parent', '=', 0)
			->where('position', '=', $menu->position)
			->orderBy('title', 'asc')
			->get()
			->lists('title', 'id');
		$parent = array('0' => 'No Parent') + $parent;
		
		return View::make('menu.edit')
			->with(array(
				'menu'=>$menu,
				'parent'=>$parent
				));
	}

	public function update($id)
	{
		if(in_array(Auth::user()->role, array('editor', 'user')))
			return Redirect::to('denied');

		$rules=array(
			'title'=>'required',
			'url'=>'required',
			'display_order'=>'required|numeric|min:1'
			);	

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {

			return Redirect::to('admin/menu/edit/'.$id)
			->withErrors($validation)
			->withInput(Input::all());
		}


		$menu = Menu::find($id);
		$menu->title = Input::get('title');
		$menu->url = Input::get('url');
		$menu->parent = Input::get('parent');
		$menu->display_order = Input::get('display_order');
		$menu->save();

		return Redirect::to('admin/menu/list/' .$menu->position)->with('message','Menu updated successfully');
	}
}