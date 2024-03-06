<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Rekening;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(){
        $data = Transaksi::all();
        return view("pages/transaksi", compact("data"));
    }

    public function tambahData(){
        $rekenings = Rekening::all();
        return view("form/form_transaksi", compact("rekenings"));
    }

    public function simpanData(Request $request){
        $request->validate([
            "no-rek" => "required",
            "nama-rek" => "required",
            "tgl-setor" => "required|date",
            "jumlah-setor" => "required"
        ]);
        
        try {
            Transaksi::create([
                "kode_rekening" => $request->input('no-rek'),
                "nama_rekening" => $request->input('nama-rek'),
                "tgl_setor" => $request->input('tgl-setor'),
                "jumlah_setor" => $request->input('jumlah-setor')
            ]);
        } catch (\Exception $e){
            dd($e->getMessage());
            return redirect()->back()->with("error", "Terjadi kesalahan, data gagal disimpan");
            
        }
        return redirect()->route('transaksi')->with("success", "Data berhasil disimpan");
    }

    public function hapusData($id_transaksi){
        $rekening = Transaksi::where('id_transaksi', $id_transaksi)->delete();
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }

    public function editData($id_transaksi){
        $data = Transaksi::where('id_transaksi', $id_transaksi)->first();
        $rekenings = Rekening::all();
        return view('form/edit_transaksi', compact('data', 'rekenings'));
    }

    public function updateData($id_transaksi, Request $request){
        $request->validate([
            'no-rek' => 'required',
            'nama-rek' => 'required',
            'tgl-setor' => 'required',
            'jumlah-setor' => 'required'
        ]);
        $data = Transaksi::where('id_transaksi', $id_transaksi)->first();
        try{
            $data->update([
                'kode_rekening' => $request->input('no-rek'),
                'nama_rekening' => $request->input('nama-rek'),
                'tgl_setor' => $request->input('tgl-setor'),
                'jumlah_setor' => $request->input('jumlah-setor')
            ]);
        } catch (\Exception $e){
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', 'Data gagal di edit'.$errorMessage);
        }
        return redirect()->route('transaksi')->with('success', 'Data berhasil diperbarui');
    }

    public function search(Request $request){
        $keyword = $request->input('search');
        $data = Transaksi::where('nama_rekening', 'like', "%$keyword%")
                            ->get()
                            ->sortBy('kode_rekening');
        return view('pages/transaksi', compact('data'));
    }
    
}
