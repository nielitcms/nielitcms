<?php

class HomeController extends BaseController
{
	public function index()
	{
		$latest_posts = Content::with('author', 'categories')
			->where('type', '=', 'post')
			->where('status', '=', 'published')
			->orderBy('created_at', 'desc')
			->get()->take(Setting::getdata('no_of_post'));

		return View::make('home.index')
			->with(array(
				'latest_posts' => $latest_posts
				));
	}

}