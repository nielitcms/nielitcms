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
		return $this->belongsToMany('PostCategory', 'post_categories', 'post_id', 'id');//->withPivot('category_id');
	}
}