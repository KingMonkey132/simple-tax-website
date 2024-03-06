@extends('../layouts.main')

@section('container')
    <style>
        input{
            margin-left: 7px;
        }
    </style>

    <h1>Laporan Penerimaan Pajak</h1>
    <form action="{{route('generate')}}" method="POST">
    @csrf
        <label for="bulan">Bulan: </label><input type="text" id="bulan" name="bulan">
        <label for="tahun">Tahun: </label><input type="text" id="tahun" name="tahun">
        <input type="submit" name="Submit" value="Cari">
    </form>
    
    <script src="{{asset('js/datepicker.js')}}"></script>

@endsection