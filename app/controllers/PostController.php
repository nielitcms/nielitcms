<?php

class PostController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
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
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
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
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title' => 'required',
			'content' => 'required',
			'category' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/post/create')
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

		return Redirect::to('/admin/post')->with('message', 'Post created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Content::with('author','categories','comments')
			->where('type', '=', 'post')
			->where('status', '=', 'published')
			->find($id);

		if(!$post)
			return Redirect:: to('/notfound');

		return View::make('post.show')
			->with(array(
				'post' => $post
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
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'title' => 'required',
			'content' => 'required',
			'category' => 'required'
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/post/edit/' . $id)
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

		return Redirect::to('/admin/post')->with('message', 'Post updated successfully.');
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

		$content = Content::find($id);
		$comments=Comment::where('post_id' , '=', $id);
		$comments->delete();
		$content->categories()->detach();
		$content->delete();
		
		if($page)
			return Redirect::to('/admin/post/?page=' . $page)->with('message', 'Post deleted successfully.');
		else
			return Redirect::to('/admin/post/')->with('message', 'Post deleted successfully.');
	}

	public function comment($id)
	{

		$rules = array(
			'comment_body'=> 'required'
		);	

		$validation= Validator::make(Input::all(), $rules);

		if ($validation ->fails()) {
			return Redirect::to('post/'.$id)
				->withErrors($validation);
		}
		
		$comment = new Comment;
		$comment->comment_body = Input::get('comment_body');
		$comment->author_id = Auth::user()->id;
		$comment->post_id = $id;
		$comment->save();

		return Redirect::to('post/' . $id . '#comments');
	}

}