<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('photos', function($table)
			{
				$table->increments('id')->unsigned();
				$table->string('title');
				$table->string('description');
				$table->string('photo_path');
				$table->integer('album_id')->unsigned();
				$table->timestamps();
				$table->softDeletes();
				$table->engine='MyISAM';
			});

		DB::statement('ALTER TABLE photos ADD FULLTEXT photosearch(title)');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('photos', function($table) {
            $table->dropIndex('photosearch');
        });

		Schema::dropIfExists('photos');
	}

}
