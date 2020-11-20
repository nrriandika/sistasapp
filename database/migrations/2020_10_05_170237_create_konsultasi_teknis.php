<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTeknis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi_teknis', function (Blueprint $table) {
            $table->id();
            $table->integer('submitter_id')->unsigned();
            $table->foreign('submitter_id')->references('id')->on('users');
            $table->string('judul');
            $table->text('keterangan')->nullable();
            $table->dateTime('tanggal');
            $table->boolean('status')->default(0);
            $table->integer('verifikator_id')->unsigned()->nullable();
            $table->foreign('verifikator_id')->references('id')->on('users');
            $table->string('room_url')->nullable();
            $table->string('room_password')->nullable();
            $table->string('dokumen_notulensi')->nullable();
            $table->string('dokumen_notulensi_format')->nullable();
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
        Schema::dropIfExists('konsultasi_teknis');
    }
}
