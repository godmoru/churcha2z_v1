<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundationClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_classes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('location_id')->references('id')->on('locations');
            $table->integer('counselor_id')->references('id')->on('counselors')->nullable();
            $table->integer('created_by')->references('id')->on('users');
            $table->text('descriptions')->nullable();
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
        Schema::dropIfExists('foundation_classes');
    }
}
