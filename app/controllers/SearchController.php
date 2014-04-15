<?php

class SearchController extends \BaseController {

	/**
	 *
	 * @return Response
	 */
	public function index()
	{
		$q = Input::get('query')."*";

		$contents = Content::whereRaw(
					"MATCH(title,content) AGAINST(? IN BOOLEAN MODE)",
					array($q)
				)->get();

		$downloads = Download::whereRaw(
					"MATCH(title) AGAINST(? IN BOOLEAN MODE)",
					array($q)
				)->get();

		$albums = Album::whereRaw(
					"MATCH(title,description) AGAINST(? IN BOOLEAN MODE)",
					array($q)
				)->get();

		$photos = Photo::whereRaw(
					"MATCH(title) AGAINST(? IN BOOLEAN MODE)",
					array($q)
				)->get();

		return View::make('search.index', compact('contents', 'downloads', 'albums', 'photos'));
	}

}