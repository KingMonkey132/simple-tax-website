<?php

namespace App\Http\Controllers;
use App\Models\Rekening;
use Illuminate\Http\Request;

class rekeningController extends Controller
{
    public function index(){
        $data = Rekening::all()->sortBy('kode_rekening');
        return view("pages/rekening", compact("data"));
    }

    public function tambahData(){
        return view("form/form_rekening");
    }

    public function simpanData(Request $request){
        $request->validate([
            "no-rek" => "required",
            "nama-rek" => "required"
        ]);
        
        try {
            Rekening::create([
                "kode_rekening" => $request->input('no-rek'),
                "nama_rekening" => $request->input('nama-rek')
            ]);
        } catch (\Exception $e){
            return redirect()->back()->with("error", "terjadi kesalahan, data gagal disimpan");
        }
        return redirect()->route('rekening')->with("success", "Data berhasil ditambahkan");
    }

    public function hapusData($kode_rekening){
        $rekening = Rekening::where('kode_rekening', $kode_rekening)->delete();
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }

    public function editData($kode_rekening){
        $data = Rekening::where('kode_rekening', $kode_rekening)->first();
        return view('form/edit_rekening', compact('data'));
    }

    public function updateData($kode_rekening, Request $request){
        $request->validate([
            "no-rek" => "required",
            "nama-rek" => "required"
        ]);

        $data = Rekening::where('kode_rekening', $kode_rekening)->first();
        try{
            $data->update([
                "kode_rekening" => $request->input('no-rek'),
                "nama_rekening" => $request->input('nama-rek')
            ]);
        } catch (\Exception $e){
            // $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', "Terdapat kesalahan, Data gagal di Edit");
            } 
        return redirect()->route('rekening')->with("success", "Data berhasil di Edit");
    }
    
    public function search(Request $request){
        $keyword = $request->input('search');
        $data = Rekening::where('nama_rekening', 'like', "%$keyword%")
                            ->get()
                            ->sortBy('kode_rekening');
        return view('pages/rekening', compact('data'));
    }
}
