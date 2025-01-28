<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoundationClassAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foundation_class_attendances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('people_id')->foreign()->references('id')->on('people');
            $table->integer('class_1_status');
            $table->date('class_1_dated')->nullable();
            $table->integer('c1_counselor_id')->foreign()->references('id')->on('counselors');

            $table->integer('class_2_status');
            $table->date('class_2_dated')->nullable();
            $table->integer('c2_counselor_id')->foreign()->references('id')->on('counselors');

            $table->integer('class_3_status');
            $table->date('class_3_dated')->nullable();
            $table->integer('c3_counselor_id')->foreign()->references('id')->on('counselors');

            $table->integer('class_4_status');
            $table->date('class_4_dated')->nullable();
            $table->integer('c4_counselor_id')->foreign()->references('id')->on('counselors');

            $table->integer('class_5_status');
            $table->date('class_5_dated')->nullable();
            $table->integer('c5_counselor_id')->foreign()->references('id')->on('counselors');

            $table->integer('class_6_status');
            $table->date('class_6_dated')->nullable();
            $table->integer('c6_counselor_id')->foreign()->references('id')->on('counselors');

            $table->text('report')->nullable();
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
        Schema::dropIfExists('foundation_class_attendances');
    }
}
