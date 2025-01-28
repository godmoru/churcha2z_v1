<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkforcedeptsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('workforcedepts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('dept_name', 50)->unique();
			$table->integer('dept_hod');
			$table->string('dept_phone', 30)->unique();
			$table->string('dept_email', 60)->unique();
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
		Schema::drop('workforcedepts');
	}

}
