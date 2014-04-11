<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenusTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('menus', function($table)
			{
				$table->increments('id')->unsigned();
				$table->string('title');
				$table->string('url')->nullable();
				$table->enum('position', array('top', 'sidebar','bottom'))->default('top');
				$table->integer('parent')->unsigned();
				$table->integer('display_order')->unsigned();
				$table->timestamps();
				$table->softDeletes();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('menus');
	}

}
