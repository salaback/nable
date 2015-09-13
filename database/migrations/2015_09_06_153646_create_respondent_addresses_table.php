<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondentAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respondent_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('street_number');
			$table->string('street_name');
			$table->string('apt');
			$table->string('city');
			$table->string('state');
			$table->integer('zip');
			$table->string('type');
			$table->integer('project_id');
			$table->integer('respondent_id');
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
		Schema::drop('respondent_addresses');
	}

}
