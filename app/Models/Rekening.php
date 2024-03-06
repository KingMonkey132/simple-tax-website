<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    protected $table = "tabel_rekening";
    protected $primaryKey = "kode_rekening";

    public $incrementing = false;

    protected $fillable = ['kode_rekening', 'nama_rekening'];

}
