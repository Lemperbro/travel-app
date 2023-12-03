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
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id');
            $table->string('doc_no');
            $table->string('invoice_id');
            $table->string('payment_channel');
            $table->string('payment_vendor');
            $table->bigInteger('refund_amount');
            $table->string('number_refund');
            $table->enum('status',['waiting','success'])->default('waiting');
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
        Schema::dropIfExists('refunds');
    }
};
