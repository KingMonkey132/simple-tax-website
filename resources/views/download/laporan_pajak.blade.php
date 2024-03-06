@extends('../layouts.download')

@section('download')
    <style>
        input{
            margin-left: 7px;
        }
        table{
            margin-top: 10px;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 2px 5px 2px 5px;
        }

    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <h3>Bulan : {{$bulan}}</h3>
    <h3>Tahun : {{$tahun}}</h3>
   
    <table>
        <tr>
            <th>Kode Rekening</th>
            <th>Nama Rekening</th>
            <th>Target Anggaran</th>
            <th>sd Bulan Lalu</th>
            <th>Bulan Ini</th>
            <th>sd Bulan Ini</th>
            <th>%</th>
        </tr>
        @foreach($laporan as $data)
        <tr>
            <td>{{$data['kode_rekening']}}</td>
            <td>{{$data['nama_rekening']}}</td>
            <td>{{$data['target_anggaran']}}</td>
            <td>{{$data['sd_bulan_lalu']}}</td>
            <td>{{$data['bulan_ini']}}</td>
            <td>{{$data['sd_bulan_ini']}}</td>
            <td>{{$data['percentage']}}</td>
        </tr>
        @endforeach
    </table>

@endsection