<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisbursementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disbursements', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->foreign()->references('id')->on('users');
            $table->bigInteger('location_id')->foreign()->references('id')->on('locations');
            $table->string('date_of_deposit');
            $table->string('depositor_name');
            $table->string('bank_name');
            $table->string('teller_number');
            $table->string('type');
            $table->string('amount');
            $table->string('year');
            $table->string('month');
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
        Schema::dropIfExists('disbursements');
    }
}
