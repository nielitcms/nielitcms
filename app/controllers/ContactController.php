<?php

class ContactController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('contact.contact');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function send()
	{
		$rules= array(
				'name'=>'required',
				'email'=>'required|email',
				'message'=>'required'
				);

		$validation = Validator::make(Input::all(), $rules);

		if($validation->fails()) {
			return Redirect::to('/contact')
				->withErrors($validation)
				->withInput(Input::all());
		}

		$to      = Setting::getData('contact_us_email');
		$subject = 'Website Contact Form Submission';
		$message = "Name: " . Input::get('name') . "\n";
		$message .= "Contact Number: " . Input::get('contact') . "\n";
		$message .= "Message: \n" . Input::get('message');
		$sender  = Input::get('email');
	
		try {
			mail($to, $subject, $message, $sender);
		}
		catch(Exception $e) {

		}

		return Redirect::to('/contact')->withMessage('Email Sent Successfully');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('contact.create');
	}


	public function store()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'contact' => 'required|numeric',
			'designation' => 'required',
			'category' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/contact/create')
				->withErrors($validator)
				->withInput(Input::all());
					
		$contact = new Contact();
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->contact = Input::get('contact');
		$contact->designation = Input::get('designation');
		$contact->category = Input::get('category');
		$contact->save();
		return Redirect::to('/admin/contact')->with('message', ' Contact created successfully.');
	}

	public function view()
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');

		$contacts = Contact::paginate(Setting::getData('no_of_item_perpage'));

		$index = $contacts->getCurrentPage() > 1? (($contacts->getCurrentPage()-1) * $contacts->getPerPage())+1 : 1;
		return View::make('contact.index')
			->with(array(
				'contacts' => $contacts,
				'index' => $index
				));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show()
	{
		$contacts = Contact::paginate(Setting::getData('no_of_item_perpage'));

		$index = $contacts->getCurrentPage() > 1? (($contacts->getCurrentPage()-1) * $contacts->getPerPage())+1 : 1;
		return View::make('contact.show')
			->with(array(
				'contacts' => $contacts,
				'index' => $index
				));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

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

		$contact=Contact::find($id);
		return View::make('contact.edit')
			->with(array('contact'=>$contact));
		
	}

	public function save($id)
	{
		if(in_array(Auth::user()->role, array('user')))
			return Redirect::to('denied');
		$rules = array(
			'name' => 'required',
			'email' => 'required|email',
			'contact' => 'required|numeric',
			'designation' => 'required',
			'category' => 'required',
			);
		$validator = Validator::make(Input::all(), $rules);

		if($validator->fails())
			return Redirect::to('/admin/contact/edit/'.$id)
				->withErrors($validator)
				->withInput(Input::all());
					
		$contact = Contact::find($id);
		$contact->name = Input::get('name');
		$contact->email = Input::get('email');
		$contact->contact = Input::get('contact');
		$contact->designation = Input::get('designation');
		$contact->category = Input::get('category');
		$contact->save();
		return Redirect::to('/admin/contact')->with('message', ' Contact edited successfully.');
		
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
		
		$count=Contact::count();
		if($count%Setting::getData('no_of_item_perpage')==1)
			$page=$page-1;
		Contact::destroy($id);
		
		if($page)
			return Redirect::to('/admin/contact/?page=' . $page)->with('message', 'Contact deleted successfully.');
		else
			return Redirect::to('/admin/contact')->with('message', 'Contact deleted successfully.');	
	}

}