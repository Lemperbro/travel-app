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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id')->nullable();
            $table->string('judul');
            $table->enum('tipe', ['min_jumlah', 'min_harga', 'aktif']);
            $table->integer('min_harga')->nullable();
            $table->integer('min_jumlah')->nullable();
            $table->integer('potongan');
            $table->boolean('status')->default(false);
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
        Schema::dropIfExists('events');
    }
};
