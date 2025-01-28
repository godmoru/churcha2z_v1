<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->foreign()->references('id')->on('services');
            $table->integer('location_id')->foreign()->references('id')->on('locations');
            $table->integer('male');
            $table->integer('female');
            $table->integer('children');
            $table->date('service_date');
            $table->integer('attendance_note')->nullable();
            $table->integer('user_id')->foreign()->references('id')->on('users');
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
        Schema::dropIfExists('service_attendances');
    }
}
