<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodeDatabatasWilayah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periode_databatas_wilayah', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('idPeriodeData')->unsigned()->index();
            $table->integer('idJenisDataBatasWilayah')->unsigned()->index();
            $table->integer('idData');
            $table->timestamps();
        });

        Schema::table('periode_databatas_wilayah', function (Blueprint $table) {
            $table->foreign('idPeriodeData')->references('id')->on('periode_data');
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
        Schema::dropIfExists('periode_databatas_wilayah');
    }
}
