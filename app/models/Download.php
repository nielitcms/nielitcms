<?php
class Download extends Eloquent
{
	protected $table = 'downloads';

	public function creator()
	{
		return $this->hasOne('User', 'id', 'created_by');
	}
}