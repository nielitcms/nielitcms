<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create('users', function($table)
			{
				$table->increments('id')->unsigned();
				$table->string('username');
				$table->string('display_name')->nullable();
				$table->string('password');
				$table->string('email')->nullable();
				$table->enum('role', array('administrator', 'editor'))->default('editor');
				$table->string('token')->nullable();
				$table->string('token_expiry_time')->nullable();
				$table->enum('status', array('active', 'inactive', 'pending'))->default('pending');
			
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
		Schema::dropIfExists('users');
	}

}
