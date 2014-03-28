<?php
class Content extends Eloquent
{
	protected $table = 'contents';

	public function author()
	{
		return $this->hasOne('User', 'id', 'author_id');
	}

	public function categories()
	{
		return $this->belongsToMany('Category', 'content_category', 'content_id', 'category_id');
	}
}