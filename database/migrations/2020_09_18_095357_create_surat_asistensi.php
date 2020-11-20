<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratAsistensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_asistensi', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('form_id')->unsigned();
            $table->foreign('form_id')->references('id')->on('form_asistensi');
            $table->boolean('status')->default(0);
            $table->integer('id_jenis_pengajuan')->unsigned();
            $table->foreign('id_jenis_pengajuan')->references('id')->on('jenis_pengajuan');
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
        Schema::dropIfExists('surat_asistensi');
    }
}
