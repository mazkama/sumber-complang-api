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
        Schema::create('detail_penjualan_barang', function (Blueprint $table) {
            $table->id('id_detail_penjualan_barang');
            $table->unsignedBigInteger('id_penjualan_barang');
            $table->unsignedBigInteger('id_barang');
            $table->integer('jumlah');
            $table->decimal('subtotal', 15, 2);
            $table->timestamps();
        
            $table->foreign('id_penjualan_barang')->references('id_penjualan_barang')->on('penjualan_barang')->onDelete('cascade');
            $table->foreign('id_barang')->references('id_barang')->on('barang')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_penjualan_barang');
    }
};
