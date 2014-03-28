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
			->get();
		return View::make('post.index')->with(array(
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
		$content->save();

		foreach(Input::get('category') as $category) {
			$post_category = new PostCategory();
			$post_category->post_id = $content->id;
			$post_category->category_id = $category;
			$post_category->save();
		}

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
		//
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
		//
	}

}