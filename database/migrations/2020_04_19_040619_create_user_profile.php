<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile', function (Blueprint $table) {
            $table->id()->increments();
            $table->integer('user_id')->unsigned();
            $table->string('jabatan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('nip', 18)->nullable();
            $table->text('bio')->nullable();
            $table->string('telepon', 14)->nullable();
            $table->string('avatar_path')->nullable();
            $table->timestamps();
        });

        Schema::table('user_profile', function(Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profile');
    }
}
