<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKonsultasiTeknisPembimbingTeknis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsultasi_teknis_pembimbing_teknis', function (Blueprint $table) {
          $table->id();
          $table->integer('pembimbing_teknis_id')->unsigned();
          $table->foreign('pembimbing_teknis_id')->references('id')->on('pembimbing_teknis');
          $table->integer('konsultasi_teknis_id')->unsigned();
          $table->foreign('konsultasi_teknis_id')->references('id')->on('konsultasi_teknis');
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
        Schema::dropIfExists('konsultasi_teknis_pembimbing_teknis');
    }
}
