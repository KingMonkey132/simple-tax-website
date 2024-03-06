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
        Schema::create('tabel_anggaran', function (Blueprint $table) {
            $table->id('id_anggaran');
            $table->string('kode_rekening', 8);
            $table->string('nama_rekening');
            $table->string('tahun_anggaran');
            $table->float('target_anggaran', 255);
            $table->unique(['kode_rekening', 'tahun_anggaran']);
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER update_rekening_anggaran
            AFTER UPDATE ON tabel_rekening
            FOR EACH ROW
            BEGIN
                UPDATE tabel_anggaran
                SET tabel_anggaran.kode_rekening = NEW.kode_rekening,
                    tabel_anggaran.nama_rekening = NEW.nama_rekening
                WHERE tabel_anggaran.kode_rekening = OLD.kode_rekening;
            END;

            CREATE TRIGGER delete_rekening_anggaran
            AFTER DELETE ON tabel_rekening
            FOR EACH ROW
            BEGIN
                DELETE FROM tabel_anggaran
                WHERE tabel_anggaran.kode_rekening = OLD.kode_rekening;
            END;

            ALTER TABLE tabel_anggaran
            ADD COLUMN jenis_rekening VARCHAR(5) GENERATED ALWAYS AS (SUBSTRING(kode_rekening, 1, 5)),
            ADD COLUMN sub_rekening VARCHAR(3) GENERATED ALWAYS AS (SUBSTRING(kode_rekening, 6, 8));
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_anggaran');
    }
};
