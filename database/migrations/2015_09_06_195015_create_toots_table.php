<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTootsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('namespace');
			$table->string('prefix');
			$table->string('icon');
			$table->text('description');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('toots');
	}

}
