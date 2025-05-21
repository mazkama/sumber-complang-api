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
        Schema::create('transaksi_tiket', function (Blueprint $table) {
            $table->id('id_transaksi_tiket');
            $table->unsignedBigInteger('id_user');
            $table->decimal('total_harga', 15, 2);
            $table->enum('metode_pembayaran', ['ewallet', 'tunai'])->nullable();
            $table->unsignedBigInteger('id_divalidasi_oleh')->nullable();
            $table->timestamp('waktu_validasi')->nullable();
            $table->enum('status', ['menunggu', 'dibayar', 'divalidasi'])->default('menunggu');
            $table->timestamps();
        
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_divalidasi_oleh')->references('id_user')->on('users')->onDelete('set null');
        });        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_tiket');
    }
};
