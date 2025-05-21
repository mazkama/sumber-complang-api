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
        Schema::create('log_pengunjung', function (Blueprint $table) {
            $table->id('id_log_pengunjung');
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal');
            $table->enum('jenis_tiket', ['masuk', 'kolam']);
            $table->timestamp('waktu_masuk')->nullable();
            $table->timestamps();
        
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_pengunjung');
    }
};
