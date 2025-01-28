<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('districts', function(Blueprint $table)
		{
			$table->increments('id');
				$table->string('dis_name'); 
				$table->integer('id_pastor');
				$table->integer('phone1');
				$table->string('dis_email');
				$table->integer('id_state');
				$table->integer('id_lg');
				$table->integer('id_zone');
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
		Schema::drop('districts');
	}

}
