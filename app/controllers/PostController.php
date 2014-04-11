<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = Content::with('author', 'categories')
			->where('type','=','post')
			->orderBy('created_at', 'desc')
			->paginate(Setting::getData('no_of_item_perpage'));

		$index = $posts->getCurrentPage() > 1? (($posts->getCurrentPage()-1) * $posts->getPerPage())+1 : 1;

		return View::make('post.index')->with(array(
			'posts' => $posts,
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
		$categories = Category::orderBy('name', 'asc')->get()->lists('name', 'id');
		return View::make('post.create')->with(array(
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
			return Redirect::to('post/create')
				->withErrors($validator)
				->withInput(Input::all());

		$content = new Content();
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->type = 'post';
		$content->status = Input::get('status');
		$content->save();

		$content->categories()->attach(Input::get('category'));

		return Redirect::to('post')->with('message', 'Post created successfully.');
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
		$categories = Category::orderBy('name', 'asc')->get()->lists('name', 'id');
		$post = Content::with('categories')->find($id);
		return View::make('post.edit')->with(array(
			'categories' => $categories,
			'post' => $post
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
			'content' => 'required',
			'category' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('post/edit/' . $id)
				->withErrors($validator)
				->withInput(Input::all());

		$content = Content::find($id);
		$content->title = Input::get('title');
		$content->content = Input::get('content');
		$content->author_id = Auth::user()->id;
		$content->status = Input::get('status');
		$content->save();

		$content->categories()->detach();
		$content->categories()->attach(Input::get('category'));

		return Redirect::to('post')->with('message', 'Post updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$content = Content::find($id);
		$content->categories()->detach();
		$content->delete();
		
		return Redirect::to('post')->with('message', 'Post deleted successfully.');
	}

}