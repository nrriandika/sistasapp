<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFileAsistensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_asistensi', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('id_form_asistensi')->unsigned();
            $table->foreign('id_form_asistensi')->references('id')->on('form_asistensi');
            $table->integer('id_doc_asistensi')->unsigned();
            $table->foreign('id_doc_asistensi')->references('id')->on('detail_dokumen_asistensi');
            $table->string('name');
            $table->text('catatan')->nullable();
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('file_asistensi');
    }
}
