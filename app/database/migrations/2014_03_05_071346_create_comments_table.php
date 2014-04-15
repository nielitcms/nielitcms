<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration 
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table)
		{
			$table->increments('id')->unsigned();
			$table->text('comment_body');
			$table->integer('author_id')->unsigned();
			$table->integer('post_id')->unsigned();
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
		Schema::dropIfExists('comments');
	}

}
