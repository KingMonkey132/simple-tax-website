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

</style>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h1>Edit Data Rekening</h1>
        <form action="{{route('update-data-rekening', $data->kode_rekening)}}" class="edit_form" method="post">
            @method('put')
            @csrf
            <h5 class="form-label">Kode Rekening</h5><input type="text" name="no-rek" value="{{$data->kode_rekening}}">
            <h5 class="form-label">Nama Rekening</h5><input type="text" name="nama-rek" value="{{$data->nama_rekening}}">
            <input type="submit" value="Submit">
        </form>

@endsection