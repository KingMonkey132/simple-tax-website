<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "tabel_transaksi";
    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['kode_rekening', 'nama_rekening',
                           'jumlah_setor', 'tgl_setor'];
}
