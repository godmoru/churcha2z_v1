<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpenditureTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenditure_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->index();
            $table->integer('expenditure_category_id')->foreign()->references('id')->on('expenditure_categories');
            $table->text('description')->nullable();
            $table->integer('created_by')->references('id')->on('users');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('expenditure_types');
    }
}
