<?php
class CategoryController extends BaseController {

	public function create()
	{
		return View::make('category.create');
	}
	
	public function postCreate()
	{
		$rules = array(
			'name'=>'required');

		$validation= Validator::make(Input::all(), $rules);

		if($validation ->fails()) {
			return Redirect::to('category/create')->withErrors($validation);
		}

		$category = new Category;
		$category->name = Input::get('name');
		$category->save();
		
		return Redirect::to('category/create')->with('message','Category created successfully');
	}

	public function index()
	{

		$categories=Category::all();
		return View::make('category.index')->with('cats',$categories);
	}

	public function remove($id)
	{
		category::destroy($id);
		return Redirect::to('category')->with('message','category deleted Successfully');
		// Category::destroy($id);
		// return Redirect::to('category')->with('message','Category deleted Successfully');
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
	return Redirect::to('category')->with('message', 'Category Edit/Update Successfully');
	}
}
?>