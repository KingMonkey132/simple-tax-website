<?php

namespace App\Http\Controllers;
use App\Models\Laporan;
use App\Models\Rekening;
use App\Models\Anggaran;
use App\Models\Transaksi;
use Dompdf\Dompdf;
use Dompdf\Options;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view ("pages/laporan");
    }

    public function generate(Request $request){
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');
        
        $transaksis = Transaksi::where(function($query) use ($bulan, $tahun){
            $query->whereYear('tgl_setor', '<', $tahun)
            ->orWhere(function($query) use($bulan, $tahun){
                $query->whereYear('tgl_setor', '=', $tahun)
                      ->whereMonth('tgl_setor', '<=', $bulan);
            });
        })->get();


        $laporan = [];
       
        foreach($transaksis as $transaksi){
            $kode_rekening = $transaksi->kode_rekening;
            $nama_rekening = $transaksi->nama_rekening;
        
        $target = Anggaran::where('kode_rekening', $kode_rekening)
                            ->where('tahun_anggaran', $tahun)->first();
        
        //Jumlah Setor Bulan Ini
        $bulan_ini = Transaksi::where('kode_rekening', $kode_rekening)
                                ->where(function($query) use ($bulan, $tahun){
                                    $query->whereYear('tgl_setor', '=', $tahun)
                                            ->whereMonth('tgl_setor','=', $bulan);})
                                            ->sum('jumlah_setor');

        //Jumlah Setor Sampai Dengan Bulan Lalu
        $sd_bulan_lalu = Transaksi::where('kode_rekening', $kode_rekening)
                                    ->where(function($query) use ($bulan, $tahun){
                                            $query->whereYear('tgl_setor', '=', $tahun)
                                                    ->whereMonth('tgl_setor', '<', $bulan);})
                                                    ->sum('jumlah_setor');

        //Jumlah Setor sampai dengan bulan ini
        $sd_bulan_ini = $sd_bulan_lalu + $bulan_ini;

        //Presentasi
        $percentage = $target && $target->target_anggaran != 0 ? number_format(($sd_bulan_ini / $target->target_anggaran)*100, 2) : 'undefined';
        $sd_bulan_lalu = $sd_bulan_lalu ?? 0 ;
        $bulan_ini = $bulan_ini ?? 0;

        $found = false;

        foreach($laporan as $item){
            if ($item['kode_rekening']===$kode_rekening){
                $item['sd_bulan_lalu'] += $sd_bulan_lalu;
                $item['bulan_ini'] += $bulan_ini;
                $item['sd_bulan_ini'] += $sd_bulan_ini;
                $found = true;
                break;
            }
        }

        if(!$found){
            $laporan[$kode_rekening] = [
                'kode_rekening' => $kode_rekening,
                'nama_rekening' => $nama_rekening,
                'target_anggaran' => $target ? $target->target_anggaran : 0,
                'sd_bulan_lalu'=> $sd_bulan_lalu,
                'bulan_ini' => $bulan_ini,
                'sd_bulan_ini' => $sd_bulan_ini,
                'percentage' => $percentage
            ];
        }

       
        }
        session(['laporan' => $laporan]);
        session(['bulan'=>$bulan]);
        session(['tahun'=>$tahun]);

        return view('pages/show', compact('laporan', 'bulan', 'tahun'));
    }

    public function generatePDF(Request $request){
    $bulan = session('bulan', '');
    $tahun = session('tahun', '');
    $laporan = session('laporan', []);
    $html = view('download/laporan_pajak', compact('laporan', 'bulan', 'tahun'))->render();
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true);

    // Buat instance Dompdf
    $dompdf = new Dompdf($options);

    // Muat HTML ke Dompdf
    $dompdf->loadHtml($html);

    // Atur ukuran dan orientasi halaman
    $dompdf->setPaper('A4', 'landscape');

    // Render PDF
    $dompdf->render();

    // Simpan PDF ke file atau kirimkan langsung ke browser
    $dompdf->stream('laporan_pajak.pdf');
    }
}
