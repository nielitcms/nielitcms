<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('content_category', function($table)
		{
			$table->increments('id')->unsigned();
			$table->integer('content_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->engine='MyISAM';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('content_category');
	}

}
