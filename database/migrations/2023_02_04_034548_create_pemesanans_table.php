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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_id');
            $table->foreignId('wisata_id');
            $table->foreignId('user_id');
            $table->string('pickup_kota');
            $table->string('pickup_point');
            $table->string('drop_kota');
            $table->string('drop_point');
            $table->text('doc_no');
            $table->bigInteger('amount');
            $table->text('description');
            $table->string('payment_status');
            $table->string('payment_link');
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
        Schema::dropIfExists('pemesanans');
    }
};
