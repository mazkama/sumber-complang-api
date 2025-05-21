<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transaksi_tiket', function (Blueprint $table) {
            $table->string('order_id')->unique()->after('id_transaksi_tiket');
        });
    }

    public function down()
    {
        Schema::table('transaksi_tiket', function (Blueprint $table) {
            $table->dropColumn('order_id');
        });
    }

};
