<?php
class CategoryController extends BaseController {

	public function index()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');

		$categories = Category::paginate(Setting::getData('no_of_item_perpage'));

		$index = $categories->getCurrentPage() > 1? (($categories->getCurrentPage()-1) * $categories->getPerPage())+1 : 1;
		return View::make('category.index')
			->with(array(
				'categories' => $categories,
				'index' => $index
				));
	}

	public function create()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		return View::make('category.create');
	}
	
	public function postCreate()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'name'=>'required|unique:categories,name');

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('/admin/category/create')->withErrors($validation);
		}

		$category = new Category;
		$category->name = Input::get('name');
		$category->save();

		// send emil
		// Mail::send('emails.auth.test',array('name'=>'ajay'), function($message){
		// 	$message->to('ajay@gmail.com', 'ajay rai')->subject('message text');
		// });
		
		return Redirect::to('/admin/category')->with('message','Category created successfully');
	}

	public function show($id)
	{
		Session::put('category_id', $id);
		$category = Category::find($id);
		if(!$category)
			return Redirect::to('/notfound');

		$posts = Content::with('author','categories')
			->where('type', '=', 'post')
			->where(function($query){
				$category_id = Session::get('category_id');
				$post_ids = ContentCategory::where('category_id', '=', $category_id)->get()->lists('content_id');
				if(!empty($post_ids))
					$query->whereIn('id', $post_ids);
				else
					$query->whereIn('id', array(0));
				Session::forget('category_id');
			})
			->paginate(Setting::getData('no_of_post'));

		return View::make('category.show')
			->with(array(
				'posts' => $posts,
				'category' => $category
				));
	}

	public function remove($id)
	{
		
		if(in_array(Auth::user()->role, array('user')))
		return Redirect::to('denied');

		$page = Input::get('page');
		
		$count=Category::count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		$category = Category::find($id);
		$category->posts()->detach();
		Category::destroy($id);
		
		if($page)
			return Redirect::to('/admin/category/?page=' . $page)->with('message', 'Category deleted successfully.');
		else
			return Redirect::to('/admin/category/')->with('message', 'Category deleted successfully.');	
	}

	public function edit($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');

		$categories = Category::paginate(Setting::getData('no_of_item_perpage'));

		$index = $categories->getCurrentPage() > 1? (($categories->getCurrentPage()-1) * $categories->getPerPage())+1 : 1;

		$current_category=Category::find($id);
		
		return View::make('category.edit')
			->with(array(
				'categories' => $categories,
				'current_category' => $current_category,
				'index' => $index
				));

	}

	public function postedit($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		
		$rules=array(
			'name'=> 'required|alpha_dash|between:4,20|unique:categories,name,'.$id);
		
		$validation = Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('/admin/category/edit/'. $id)->withErrors($validation);
		}

		$category = Category::find($id);
		$category->name = Input::get('name');
		$category->save();
		return Redirect::to('/admin/category')->with('message', 'Category updated successfully');
	}
}
