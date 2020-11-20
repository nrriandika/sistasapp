<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJenisDataBatasWilayah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_data_batas_wilayah', function (Blueprint $table) {
            $table->id()->increments();
            $table->string('nama');
            $table->string('nama_tabel_spasial');
            $table->string('nama_layer_geoserver');
            $table->string('kategori');
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
        Schema::dropIfExists('jenis_data_batas_wilayah');
    }
}
