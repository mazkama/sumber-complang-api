<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi_tiket', function (Blueprint $table) {
            $table->id('id_detail_transaksi_tiket');
            $table->unsignedBigInteger('id_transaksi_tiket');
            $table->unsignedBigInteger('id_tiket');
            $table->string('no_kendaraan')->nullable();
            $table->timestamp('waktu_validasi')->nullable();
            $table->integer('jumlah');
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();
        
            $table->foreign('id_transaksi_tiket')->references('id_transaksi_tiket')->on('transaksi_tiket')->onDelete('cascade');
            $table->foreign('id_tiket')->references('id_tiket')->on('tiket')->onDelete('cascade');
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi_tiket');
    }
};
