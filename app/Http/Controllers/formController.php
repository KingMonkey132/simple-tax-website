<?php

namespace App\Http\Controllers;
use App\Models\Rekening;

use Illuminate\Http\Request;

class formController extends Controller
{
    public function getNama($kode_rekening){
        $nama_rekening = Rekening::where('kode_rekening', $kode_rekening)->value('nama_rekening');
        return response()->json(['nama_rekening' => $nama_rekening]);
    }


}
