<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCounselorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('counselors', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('surname');
			$table->string('othernames');
			$table->string('email', 60)->unique();
			$table->string('resaddress');
			$table->string('phone1');
			$table->string('phone2');
			$table->integer('id_state');
			$table->integer('id_lga');
			$table->integer('id_zone');
			$table->integer('id_loc');
			$table->text('biography');
			$table->integer('status');
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
		Schema::drop('counselors');
	}

}
