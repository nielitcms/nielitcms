<?php

class PageController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Content::with('author', 'categories')
			->where('type','=','page')
			->orderBy('created_at', 'desc')
			->get();
		return View::make('page.index')->with(array(
			'posts' => $posts
			));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::orderBy('name', 'asc')->get()->lists('name', 'id');
		return View::make('page.create')->with(array(
			'categories' => $categories
			));
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
			'content' => 'required',
			'category' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('post/create')->withErrors($validator);

		$content = new Content();
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'page';
		$content->save();

		foreach(Input::get('category') as $category) {
			$page_category = new PostCategory();
			$page_category->post_id = $content->id;
			$page_category->category_id = $category;
			$page_category->save();
		}

		return Redirect::to('page')->with('message', 'Post created successfully.');
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
		Page::destroy($id);
		return Redirect::to('page')->with('message','User deleted Successfully');

	}
	public function postedit($id)
	{
		$rules = array(
				'username'=> 'required|alpha_dash|between:4,20|unique:users,username,'.$id,

				'display_name'=> 'required',

				'role'=>'required');					

				$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('user/edit/'. $id)->withErrors($validation);
		}

	
		$user = User::find($id);
		$user->username = Input::get('username');
		$user->display_name = Input::get('display_name');
		$user->role = Input::get('role');
		$user->save();
		return Redirect::to('user')->with('message','User Edit Successfully');

	}			
	

	/**
	 * Update the specified resource in storage.
	 *
	  * @param  int  $id
	 * @return Response
	 */
	// public function update($id)
	// {
	// 	//
	// }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function remove($id)
	{
		Page::destroy($id);
		return Redirect::to('page')->with('message','Page deleted Successfully');

	}



}