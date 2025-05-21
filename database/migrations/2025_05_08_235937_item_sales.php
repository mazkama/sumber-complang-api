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
        Schema::create('penjualan_barang', function (Blueprint $table) {
            $table->id('id_penjualan_barang');
            $table->unsignedBigInteger('id_kasir');
            $table->decimal('total_bayar', 15, 2);
            $table->enum('metode_pembayaran', ['ewallet', 'tunai']);
            $table->timestamps();
        
            $table->foreign('id_kasir')->references('id_user')->on('users')->onDelete('cascade');
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan_barang');
    }
};
