<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Masjid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masjid', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('kecamatan');
            $table->text('desa');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('deskripsi');
            $table->string('image');
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
        Schema::dropIfExists('masjid');
    }
}
