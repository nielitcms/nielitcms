<?php

class QueryController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
	}

	public function view($id)
	{
		$query=Query::find($id);
		return View::make('query.show')
			->with(array('query'=>$query));
	}


	public function recent()
	{
		$queries = Query::orderBy('created_at')->paginate(Setting::getData('no_of_item_perpage'));
		// $queries=Query::with('query')->orderBy('created_at', 'desc');
		return View::make('query.recent')
			->with(array('queries'=> $queries));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('studentcorner.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$redirect_to=Input::get('redirect_to');
		$rules = array(
			'subject' => 'required',
			'qemail' => 'required|email',
			'qtitle' => 'required',
			'query' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to($redirect_to)
				->withErrors($validator)
				->withInput(Input::all());

		$query = new Query();
		$query->subject = Input::get('subject');
		$query->email = Input::get('qemail');
		$query->title = Input::get('qtitle');
		$query->query = Input::get('query');
		$query->save();
		
		return Redirect::to($redirect_to)->with('query', 'Query Made successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');

		$query = Query::where('response', '!=' , '')->paginate(Setting::getData('no_of_item_perpage'));

		$index = $query->getCurrentPage() > 1? (($query->getCurrentPage()-1) * $query->getPerPage())+1 : 1;
		return View::make('query.index')
			->with(array(
				'query' => $query,
				'index' => $index
				));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function response($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		
		$query = Query::find($id);
		return View::make('query.response')
			->with(array(
				'query' => $query
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
		$query=Query::find($id);
		$query->response=Input::get('response');
		$query->save();
		return Redirect::to('admin/query')->with('message', 'Query responded successfully');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$query=Query::find($id);
		$query->delete();	
		return Redirect::to('/admin/query')->with('message', 'Query deleted successfully.');
	}

}