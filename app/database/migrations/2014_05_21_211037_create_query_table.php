<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQueryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('query', function($table){
			$table->increments('id');
			$table->string('subject');
			$table->string('email');
			$table->string('title', 400);
			$table->text('query')->nullable();
			$table->text('response')->nullable();
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
		Schema::dropIfExists('query');
	}

}
