<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('locations', function(Blueprint $table)
		{
	$table->increments('id');
	$table->string('loc_name');
	$table->text('loc_add')->nullable(); 
	$table->integer('pastor->id');
	$table->string('phone1');
	$table->string('phone2')->nullable();
	$table->string('loc_email');
	$table->integer('id_state');
	$table->integer('id_lg')->nullable();
	$table->integer('id_zone')->nullable();
	$table->integer('id_district')->nullable();
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
		Schema::drop('locations');
	}

}
