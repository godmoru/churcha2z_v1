<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePastorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pastors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('pst_name');
			$table->string('pst_email', 60)->unique();
			$table->string('pst_address');
			$table->string('pst_phone1', 60)->unique();
			$table->string('pst_phone2');
			$table->integer('id_state');
			$table->integer('id_lga');
			$table->integer('id_zone');
			$table->integer('id_loc')->nullable();
			$table->text('biography', 300);
			$table->integer('status');
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
		Schema::drop('pastors');
	}

}
