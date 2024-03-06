<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan_pajak';
    protected $fillable = ['kode_rekening', 'nama_rekening',
                           'target_anggaran', 'sd_bulan_lalu',
                           'bulan_ini'];
}
