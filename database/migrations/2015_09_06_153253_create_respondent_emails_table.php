<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondentEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respondent_emails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address');
			$table->string('type');
			$table->integer('project_id');
			$table->integer('respondent_id');
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
		Schema::drop('respondent_emails');
	}

}
