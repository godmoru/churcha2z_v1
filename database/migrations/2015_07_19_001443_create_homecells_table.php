<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomecellsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('homecells', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('homecell_name');
			$table->integer('id_loc');
			$table->integer('id_area');
			$table->integer('id_district');
			$table->integer('id_zone');
			$table->integer('cell_leader');
			$table->string('leader_phone', 40)->unique();
			$table->string('ast_leader');
			$table->string('ast_leader_phone');
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
		Schema::drop('homecells');
	}

}
