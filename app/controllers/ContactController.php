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
				'user_email'=>'required|email',
				'subject'=>'required',
				'message_body'=>'required'
				
				);

		$validation=Validator::make(Input::all(), $rules);

		if($validation->fails()){
				return Redirect::to('/contact')
					->withErrors($validation)
					->withInput(Input::all());
			}

		$to      = Setting::getData('contact_us_email');
		$subject = Input::get('subject');
		$message = Input::get('message_body');
		$sender  = Input::get('user_email');
	
		mail($to, $subject, $message, $sender);
		return Redirect::to('/contact')->withMessage('Email Sent Successfully');
		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		
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