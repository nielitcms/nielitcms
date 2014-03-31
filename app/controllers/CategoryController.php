<?php
class CategoryController extends BaseController {

	public function index()
	{
		$categories = Category::paginate(4);

		$index = $categories->getCurrentPage() > 1? (($categories->getCurrentPage()-1) * $categories->getPerPage())+1 : 1;
		return View::make('category.index')
			->with(array(
				'categories' => $categories,
				'index' => $index
				));
	}


	public function create()
	{
		return View::make('category.create');
	}
	
	public function postCreate()
	{
		$rules = array(
			'name'=>'required|unique:categories,name');

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('category/create')->withErrors($validation);
		}

		$category = new Category;
		$category->name = Input::get('name');
		$category->save();
		
		return Redirect::to('category/create')->with('message','Category created successfully');
	}

	
	public function remove($id)
	{
		$category = Category::find($id);
		$category->posts()->detach();
		Category::destroy($id);
		return Redirect::to('category')->with('message','Category deleted successfully');
	}

	public function edit($id)
	{
		$category=Category::find($id);
		return View::make('category.edit')->with('category',$category);
	}

	public function postedit($id)
	{
		$rules=array(
			'name'=> 'required|alpha_dash|between:4,20|unique:categories,name,'.$id);
		$validation= Validator::make(Input::all(), $rules);
	if($validation ->fails()) {
		return Redirect::to('category/edit/'. $id)->withErrors($validation);
	}

	$category = Category::find($id);
	$category->name = Input::get('name');
	$category->save();
	return Redirect::to('category')->with('message', 'Category updated successfully');
	}
}
?>