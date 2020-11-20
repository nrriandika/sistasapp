<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndeksDelineasiDesa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indeks_delineasi_desa', function (Blueprint $table) {
            $table->id();
            $table->string('kode_desa');
            $table->string('kelurahan')->nullable();
            $table->string('desa')->nullable();
            $table->string('kode_kec');
            $table->string('kecamatan');
            $table->string('kode_kab');
            $table->string('kabupaten');
            $table->string('kode_prov');
            $table->string('provinsi');
            $table->string('tahun')->nullable();
            $table->string('data_dasar')->nullable();
            $table->string('nama_pekerjaan')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('tahun_2')->nullable();
            $table->string('nama_pekerjaan_2')->nullable();
            $table->string('pelaksana_2')->nullable();
            $table->string('sumber_data')->nullable();
            $table->string('ketersediaan_data')->nullable();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('indeks_delineasi_desa');
    }
}
