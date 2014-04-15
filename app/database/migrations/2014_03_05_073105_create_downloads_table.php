<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDownloadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('downloads', function($table)
		{
			$table->increments('id')->unsigned();
			$table->string('title', 400);
			$table->integer('created_by')->unsigned();
			$table->string('file_path')->nullable();
			$table->enum('status', array('active', 'inactive'))->default('inactive');
			$table->timestamps();
			$table->softDeletes();
		});

		DB::statement('ALTER TABLE downloads ADD FULLTEXT downloadsearch(title)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('downloads', function($table) {
            $table->dropIndex('downloadsearch');
        });

		Schema::dropIfExists('downloads');
	}

}
