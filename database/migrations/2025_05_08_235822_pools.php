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
        
        Schema::create('kolam', function (Blueprint $table) {
            $table->id('id_kolam');
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->string('url_foto')->nullable();
            $table->float('kedalaman')->nullable(); // tambahkan kolom kedalaman (misal: meter)
            $table->float('luas')->nullable();      // tambahkan kolom luas (misal: m2)
            $table->timestamps();
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kolam');
    }
};
