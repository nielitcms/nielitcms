<?php
class Comment extends Eloquent
{
	protected $table = 'comments';
	public function author()
	{
		return $this->hasOne('User', 'id', 'author_id');
	}
}