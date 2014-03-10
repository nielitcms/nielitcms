<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Content extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contents', function($table){
			$table->increments('id')->unsigned();
			$table->string('title', 400);
			$table->text('content')->nullable();
			$table->integer('author_id')->unsigned();
			$table->enum('type', array('post', 'page'))->default('post');
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
		Schema::dropIfExists('contents');
	}

}
