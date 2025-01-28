<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('people', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('fname');
			$table->string('mname');
			$table->string('lname');
			$table->text('res_address')->nullable();
			$table->string('id_gender');
			$table->string('email', 60)->unique();
			$table->string('phone1');
			$table->string('phone2');
			$table->integer('id_state');
			$table->integer('id_loc');
			$table->integer('id_cat');
			$table->integer('fclass_status');
			$table->integer('dltc_status');
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
		Schema::drop('people');
	}

}
