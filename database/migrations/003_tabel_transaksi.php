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
        Schema::create('tabel_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->string('kode_rekening');
            $table->string('nama_rekening');
            $table->date('tgl_setor');
            $table->float('jumlah_setor', 255);
            $table->timestamps();
        });

        DB::unprepared('
            CREATE TRIGGER update_rekening_transaksi
            AFTER UPDATE ON tabel_rekening
            FOR EACH ROW
            BEGIN
                UPDATE tabel_transaksi
                SET tabel_transaksi.kode_rekening = NEW.kode_rekening,
                    tabel_transaksi.nama_rekening = NEW.nama_rekening
                WHERE tabel_transaksi.kode_rekening = OLD.kode_rekening;
            END;

            CREATE TRIGGER delete_rekening_transaksi
            AFTER DELETE ON tabel_rekening
            FOR EACH ROW
            BEGIN
                DELETE FROM tabel_transaksi
                WHERE tabel_transaksi.kode_rekening = OLD.kode_rekening;
            END;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_transaksi');
    }
};
