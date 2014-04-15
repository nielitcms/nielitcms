<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentsTable extends Migration {

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
			$table->enum('status', array('published', 'draft'))->default('draft');
			$table->timestamps();
			$table->softDeletes();
		});

		DB::statement('ALTER TABLE contents ADD FULLTEXT contentsearch(title, content)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('contents', function($table) {
            $table->dropIndex('contentsearch');
        });

		Schema::dropIfExists('contents');
	}

}
