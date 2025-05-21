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
        Schema::create('tiket', function (Blueprint $table) {
            $table->id('id_tiket');
            $table->string('nama_tiket');
            $table->decimal('harga', 15, 2)->comment('Harga dalam Rupiah');
            $table->string('kategori')->nullable(); // contoh: anak-anak, dewasa
            $table->enum('jenis', ['parkir', 'kolam']);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
