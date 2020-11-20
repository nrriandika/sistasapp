<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeraturanBupatiWalikota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peraturan_bupati_walikota', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama');
            $table->text('keterangan')->nullable();
            $table->integer('indeks_desa_id')->unsigned();
            $table->foreign('indeks_desa_id')->references('id')->on('indeks_delineasi_desa');
            $table->string('path_dokumen')->nullable();
            $table->string('path_geometry')->nullable();
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
        Schema::dropIfExists('peraturan_bupati_walikota');
    }
}
