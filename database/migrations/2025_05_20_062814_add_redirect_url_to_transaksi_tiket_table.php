<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('transaksi_tiket', function (Blueprint $table) {
            $table->text('redirect_url')->nullable()->after('status');;
        });
    }

    public function down()
    {
        Schema::table('transaksi_tiket', function (Blueprint $table) {
            $table->dropColumn('redirect_url');
        });
    }
};
