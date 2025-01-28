<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->text('address');
            $table->boolean('sms_notification')->default(false);
            $table->boolean('email_notification')->default(false);
            $table->string('email_outgoing_address');
            $table->text('email_outgoing_password');
            $table->string('email_outgoing_server');
            $table->tinyInteger('email_port');
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
        Schema::dropIfExists('system_preferences');
    }
}
