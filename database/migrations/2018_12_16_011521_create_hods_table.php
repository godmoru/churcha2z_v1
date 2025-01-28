<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('surname');
            $table->string('othernames');
            $table->string('email', 60)->unique();
            $table->string('resaddress');
            $table->string('phone1');
            $table->string('phone2');
            $table->integer('state_id');
            $table->integer('lga_id');
            $table->integer('location_id');
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
        Schema::dropIfExists('hods');
    }
}
