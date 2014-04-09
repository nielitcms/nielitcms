<?php
class Album extends Eloquent
{
	protected $table = 'albums';
	public function creator()
	{
		return $this->hasOne('User', 'id', 'created_by');
	}

	public function photos()
	{
		return $this->hasMany('Photo');
	}
}