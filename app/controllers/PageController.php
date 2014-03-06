<?php

class PageController extends BaseController {

	public function index()
	{
		return View::make('page.index');
	}

	public function show()
	{
		return View::make('page.display');
	}
}