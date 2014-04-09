<?php
class Photo extends Eloquent
{
	protected $table = 'photos';
	
	public function album()
	{
		return $this->belongsTo('album');
	}
}