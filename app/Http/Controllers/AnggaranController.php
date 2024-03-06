<?php

namespace App\Http\Controllers;
use App\Models\Anggaran;
use App\Models\Rekening;
use Illuminate\Http\Request;

class AnggaranController extends Controller
{
    public function index(){
        $data = Anggaran::all()->sortBy('kode_rekening');
        $rekenings = Rekening::all();
        return view("pages/target", compact("data"));
    }

    public function tambahData(){
        $rekenings = Rekening::all();
        return view("form/form_target", compact("rekenings"));
    }

    public function simpanData(Request $request){
        $request->validate([
            "no-rek" => "required",
            "nama-rek" => "required",
            "tahun-anggaran" => "required",
            "target-anggaran" => "required"
        ]);
        
        try {
            Anggaran::create([
                "kode_rekening" => $request->input('no-rek'),
                "nama_rekening" => $request->input('nama-rek'),
                "tahun_anggaran" => $request->input('tahun-anggaran'),
                "target_anggaran" => $request->input('target-anggaran')

            ]);
        } catch (\Exception $e){
            return redirect()->back()->with("error", "terjadi kesalahan, data gagal disimpan");
        }
        return redirect()->route('anggaran')->with("success", "Data berhasil disimpan");
    }

    public function hapusData($id_anggaran){
        $rekening = Anggaran::where('id_anggaran', $id_anggaran)->delete();
        return redirect()->back()->with("success", "Data berhasil dihapus");
    }

    public function editData($id_anggaran){
        $data = Anggaran::where('id_anggaran', $id_anggaran)->first();
        $rekenings = Rekening::all();
        return view('form/edit_target', compact('data', 'rekenings'));
    }

    public function updateData($id_anggaran, Request $request){
        $request->validate([
            'no-rek' => 'required',
            'nama-rek' => 'required',
            'tahun_anggaran' => 'required',
            'target_anggaran' => 'required'
        ]);
        $data = Anggaran::where('id_anggaran', $id_anggaran)->first();
        try{
            $data->update([
                'kode_rekening' => $request->input('no-rek'),
                'nama_rekening' => $request->input('nama-rek'),
                'tahun_anggaran' => $request->input('tahun_anggaran'),
                'target_anggaran' => $request->input('target_anggaran')
            ]);
        } catch (\Exception $e){
            // $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', 'Data gagal di edit');
        }
        return redirect()->route('anggaran')->with('success', 'Data berhasil diperbarui');
    }

    public function search(Request $request){
        $keyword = $request->input('search');
        $data = Anggaran::where('nama_rekening', 'like', "%$keyword%")
                            ->get()
                            ->sortBy('kode_rekening');
        return view('pages/target', compact('data'));
    }
    
}
