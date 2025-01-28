<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFClassesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('f_classes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_people');
			$table->integer('id_loc');
			$table->integer('fc_status');
			$table->integer('id_people_cat');
			$table->string('graduated');
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
		Schema::drop('f_classes');
	}

}
