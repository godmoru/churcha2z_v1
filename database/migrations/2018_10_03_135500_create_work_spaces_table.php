<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkSpacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_spaces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('classifications')->nullable();
            $table->text('descriptions')->nullable();
            $table->integer('domain_id')->references('id')->on('domains');
            $table->integer('created_by')->references('id')->on('users');
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
        Schema::dropIfExists('work_spaces');
    }
}
