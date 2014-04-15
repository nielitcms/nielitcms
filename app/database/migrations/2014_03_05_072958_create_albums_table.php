<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('albums', function($table){
			$table->increments('id')->unsigned();
			$table->string('title');
			$table->text('description')->nullable();
			$table->integer('created_by')->unsigned();
			$table->timestamps();
			$table->softDeletes();
			$table->engine='MyISAM';
		});

		DB::statement('ALTER TABLE albums ADD FULLTEXT albumsearch(title, description)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('albums', function($table) {
            $table->dropIndex('albumsearch');
        });

		Schema::dropIfExists('albums');
	}

}
