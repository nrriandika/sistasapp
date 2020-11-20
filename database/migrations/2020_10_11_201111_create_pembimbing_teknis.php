<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingTeknis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing_teknis', function (Blueprint $table) {
          $table->id();
          $table->string('nama');
          $table->string('posisi')->nullable();
          $table->string('instansi')->nullable();
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
        Schema::dropIfExists('pembimbing_teknis');
    }
}
