@extends('../layouts.main')

@section('container')
<style>
    * {
        text-align: left;
    }

    h1 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
    }

    .form-label {
        position: absolute;
        text-align: left;
        left: 0px;
        margin-left: 300px;
        margin-bottom: 10px;
    }

    input {
        margin-left: 600px;
        margin-bottom: 10px;
    }

    select {
        margin-left: 600px;
        margin-bottom: 10px;
    }

</style>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<h1>Tambah Data Transaksi</h1>
<form action="{{ route('simpan-data-transaksi') }}" class="input_form" method="post">
    @csrf
    <h5 class="form-label">Kode Rekening</h5>
    <select name="no-rek">
        <option value=""></option>
        @foreach ($rekenings as $rekening)
        <option value="{{$rekening->kode_rekening}}">{{$rekening->kode_rekening}}</option>
        @endforeach
    </select>
    <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" id="nama_rekening">
    <h5 class="form-label">Jumlah Setor</h5><input type="text" name="jumlah-setor">
    <h5 class="form-label">Tanggal Setor</h5><input type="text" name="tgl-setor" id="tgl-setor">
    <input type="submit" value="Submit">
</form>

<!-- Script -->
<script src="{{asset('js/autofill.js')}}"></script>
<script src="{{asset('js/datepicker.js')}}"></script>
@endsection
