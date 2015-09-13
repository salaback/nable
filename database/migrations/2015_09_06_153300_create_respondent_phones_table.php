<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondentPhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('respondent_phones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('number');
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
		Schema::drop('respondent_phones');
	}

}
