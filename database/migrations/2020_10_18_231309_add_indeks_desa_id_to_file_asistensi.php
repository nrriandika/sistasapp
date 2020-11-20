<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIndeksDesaIdToFileAsistensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('file_asistensi', function (Blueprint $table) {
          $table->integer('indeks_desa_id')->unsigned();
          $table->foreign('indeks_desa_id')->references('id')->on('indeks_delineasi_desa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('file_asistensi', function (Blueprint $table) {
            $table->dropColumn('indeks_desa_id');
        });
    }
}
