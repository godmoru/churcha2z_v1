<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
             $table->string('name');
            $table->text('descriptions')->nullable();
            $table->integer('document_type_id')->references('id')->on('document_types');
            $table->integer('document_classification_id')->references('id')->on('document_classifications');
            $table->integer('work_space_id')->references('id')->on('work_spaces');
            $table->integer('resource_id')->references('id')->on('resources');
            $table->string('attachment_id');
            $table->string('collections');
            $table->string('tags');
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
        Schema::dropIfExists('documents');
    }
}
