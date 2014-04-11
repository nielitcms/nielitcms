<?php
class Menu extends Eloquent
{
	protected $table = 'menus';

	public function parent_menu()
	{
		return $this->belongsTo('Menu', 'parent', 'id');
	}
}