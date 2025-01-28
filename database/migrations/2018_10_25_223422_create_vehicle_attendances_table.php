<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('location_id')->foreign()->references('id')->on('locations');
            $table->integer('service_type_id')->foreign()->references('id')->on('service_types');
            $table->integer('service_id')->foreign()->references('id')->on('services');
            $table->date('service_date');
            $table->integer('vehicle_counting_area_id')->foreign()->references('id')->on('vehicle_counting_areas');
            $table->integer('total');
            $table->text('description')->nullable();
            $table->integer('submited_by')->foreign()->references('id')->on('users');
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
        Schema::dropIfExists('vehicle_attendances');
    }
}
