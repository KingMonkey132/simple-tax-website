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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function () {
        $("#tgl-setor").datepicker({
            dateFormat: "yy-mm-dd" 
        });
    });
</script>

<h1>Tambah Data Transaksi</h1>
<form action="{{ route('update-data-transaksi', $data->id_transaksi) }}" class="input_form" method="post">
    @csrf
    @method('put')
    <h5 class="form-label">Kode Rekening</h5>
    <select name="no-rek">
        <option value="{{$data->kode_rekening}}">{{$data->kode_rekening}}</option>
        @foreach ($rekenings as $rekening)
        <option value="{{$rekening->kode_rekening}}">{{$rekening->kode_rekening}}</option>
        @endforeach
    </select>
    <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" id="nama_rekening" value="{{$data->nama_rekening}}">
    <h5 class="form-label">Jumlah Setor</h5><input type="text" name="jumlah-setor" value="{{$data->jumlah_setor}}">
    <h5 class="form-label">Tanggal Setor</h5><input type="text" name="tgl-setor" id="tgl-setor" value="{{$data->tgl_setor}}">
    <input type="submit" value="Submit">
</form>
<script src="{{asset('js/autofill.js')}}"></script>
@endsection
