<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contact', function($table){
			$table->increments('id');
			$table->string('name');
			$table->string('contact');
			$table->string('email');
			$table->string('designation');
			$table->string('category');
			$table->timestamps();
			$table->softDeletes();
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
		Schema::dropIfExists('contact');
	}

}
