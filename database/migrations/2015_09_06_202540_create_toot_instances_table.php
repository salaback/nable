<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTootInstancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('toot_instances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('toot_id');
			$table->integer('project_id');
			$table->json('settings');
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
		Schema::drop('toot_instances');
	}

}
