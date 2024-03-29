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
            $table->text('slug')->unique();
            $table->foreignId('kota_id');
            $table->string('tour_type');
            $table->integer('harga');
            $table->time('time_departure');
            $table->integer('price_child')->nullable();
            $table->string('long_tour');
            $table->string('room_type')->nullable();
            $table->string('nama_hotel')->nullable();
            $table->text('deskripsi');
            $table->string('nama_wisata');
            $table->text('image');
            $table->text('location');
            $table->integer('diboking')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();

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
