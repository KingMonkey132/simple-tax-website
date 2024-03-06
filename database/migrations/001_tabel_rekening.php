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
        Schema::create('tabel_rekening', function (Blueprint $table) {
            $table->string('kode_rekening', 8)->primary();
            $table->string('nama_rekening')->nullable(true);
            $table->timestamps();
        });

        DB::unprepared('
            ALTER TABLE tabel_rekening
            ADD COLUMN jenis_rekening VARCHAR(5) GENERATED ALWAYS AS (SUBSTRING(kode_rekening, 1, 5));

            ALTER TABLE tabel_rekening
            ADD COLUMN sub_rekening VARCHAR(3) GENERATED ALWAYS AS (SUBSTRING(kode_rekening, 6, 8));
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_rekening');
    }
};
