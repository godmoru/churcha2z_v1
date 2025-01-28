<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('members', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_loc');
			$table->string('mname');
			$table->string('email');
			$table->string('phone1');
			$table->string('phone2');
			$table->text('res_address')->nullable();
			$table->string('gender');
			$table->string('high_qual');
			$table->date('dob');
			$table->integer('m_status');
			$table->date('m_anniversary')->nullable();
			$table->date('d_born_again')->nullable();
			$table->date('water_baptism')->nullable();
			$table->date('date_holy_ghost_filled')->nullable();
			$table->integer('s_origin');
			$table->integer('lga_origin');
			$table->integer('workforce_dept');
			$table->integer('home_cell');
			$table->integer('fclass_status');
			$table->integer('dltc_status');
			$table->integer('dusom_status');
			$table->string('fname');
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
		Schema::drop('members');
	}

}
