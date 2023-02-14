<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wisatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kota_id');
            $table->foreignId('jemput_id');
            $table->string('tour_type');
            $table->date('tanggal');
            $table->text('deskripsi');
            $table->integer('group_size');
            $table->string('nama_wisata');
            $table->text('image');
            $table->text('location');
            $table->integer('harga');
            $table->integer('diboking')->default(null);
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
        Schema::dropIfExists('wisatas');
    }
};
