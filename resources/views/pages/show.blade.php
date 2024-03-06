@extends('../layouts.main')

@section('container')
    <style>
        input{
            margin-left: 7px;
        }
        table{
            margin-top: 10px;
        }
    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <form action="{{route('generate')}}" method="POST">
        @csrf
        <label for="bulan">Bulan: </label><input type="text" id="bulan" name="bulan" value="{{$bulan}}">
        <label for="tahun">Tahun: </label><input type="text" id="tahun" name="tahun" value="{{$tahun}}">
        <input type="submit" name="Submit" value="Cari">
    </form>
    <form action="{{route('download-laporan')}}" method="get" class="download-container">
        <button>Download PDF</button>
    </form>
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
    <script src="{{asset('js/datepicker.js')}}"></script>

@endsection