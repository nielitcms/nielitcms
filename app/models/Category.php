<?php
class Category extends Eloquent
{
	protected $table = 'categories';

	public function posts()
	{
		return $this->belongsToMany('Content', 'content_category', 'category_id', 'content_id');
	}
}