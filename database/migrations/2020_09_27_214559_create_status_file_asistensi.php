<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusFileAsistensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_file_asistensi', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('file_asistensi_id')->unsigned();
            $table->foreign('file_asistensi_id')->references('id')->on('file_asistensi');
            $table->integer('checker_id')->unsigned();
            $table->foreign('checker_id')->references('id')->on('users');
            $table->boolean('status')->default(1);
            $table->text('catatan')->nullable();
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
        Schema::dropIfExists('status_file_asistensi');
    }
}
