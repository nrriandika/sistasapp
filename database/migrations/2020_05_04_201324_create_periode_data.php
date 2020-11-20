<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_data', function (Blueprint $table) {
            $table->id()->increments();
            $table->string('nama');
            $table->integer('idJenisDataBatasWilayah')->unsigned()->index();
            $table->date('tanggal_periode');
            $table->boolean('active')->default(0);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });

        Schema::table('periode_data', function (Blueprint $table) {
            $table->foreign('idJenisDataBatasWilayah')->references('id')->on('jenis_data_batas_wilayah');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('periode_data');
    }
}
