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

	public function comments()
	{
		return $this->hasMany('Comment', 'post_id', 'id');
	}

	public static function inCategory($content_categories)
	{
		$allowed_categories = unserialize(Setting::getData('comment_allowed_categories'));
		foreach ($content_categories as $category) {
			if(is_array($allowed_categories) && in_array($category, $allowed_categories))
				return true;
		}
		return false;
	}
}
