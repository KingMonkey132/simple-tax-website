<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('laporan_pajak', function (Blueprint $table) {
            $table->string('kode_rekening')->primary();
            $table->string('nama_rekening');
            $table->float('target_anggaran', 200);
            $table->float('sd_bulan_lalu', 200);
            $table->float('bulan_ini', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_pajak');
    }
};
