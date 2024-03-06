<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggaran extends Model
{
    protected $table = "tabel_anggaran";
    protected $primaryKey = "id_anggaran";
    protected $fillable = ['kode_rekening', 'nama_rekening', 
                           'tahun_anggaran', 'target_anggaran'];
}
