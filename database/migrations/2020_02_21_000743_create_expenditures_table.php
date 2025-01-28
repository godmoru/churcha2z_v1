<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpendituresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditures', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->foreign()->references('id')->on('users');
            $table->bigInteger('location_id')->foreign()->references('id')->on('locations');
            $table->bigInteger('expenditure_type_id')->foreign()->references('id')->on('expenditure_types');
            $table->string('amount');
            $table->string('year');
            $table->string('month');
            $table->text('description');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('expenditures');
    }
}
