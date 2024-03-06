@extends('../layouts.main')

@section('container')

        <h1>Target Anggaran</h1>
        <button class="tambah-data"><a href="/target/tambah-data">Tambah Data</a></button>
        <div class="search-feature">
            <form action="{{route('cari-data-anggaran')}}" method="get" class="search">
                <label for="search">Cari: </label><input type="text" name="search" class="input-search" placeholder="Ketik Nama Rekening">
                <input type="submit" value="Cari">
            </form>
            <form action="{{route('anggaran')}}" method="GET" class="refresh">
                <input type="submit" value="Refresh">
            </form>
        </div>


        @if(session('success'))
        <style>
            .alert {
                margin-top: 10px;
            }
        </style>
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="table-container">
            <table>
                <tr>
                    <th>Kode Rekening</th>
                    <th>Jenis Rekening</th>
                    <th>Sub Rekening</th>
                    <th>Nama Rekening</th>
                    <th>Tahun Anggaran</th>
                    <th>Target Anggaran</th>
                    <th>Aksi</th>
                </tr>

                @foreach($data as $item)
                <tr>
                    <td>{{ $item->kode_rekening }}</td>
                    <td>{{ $item->jenis_rekening }}</td>
                    <td>{{ $item->sub_rekening }}</td>
                    <td>{{ $item->nama_rekening }}</td>
                    <td>{{ $item->tahun_anggaran}}</td>
                    <td>{{ $item->target_anggaran }}</td>
                    <td>
                        <div class="action-container">
                            <form action="{{route('edit-data-anggaran', $item->id_anggaran)}}" method="get">
                                @csrf
                                <button type="submit">Edit</button>
                            </form>
                            <form action="{{ route('hapus-data-anggaran', $item->id_anggaran) }}" method="post" id="delete-{{$item->kode_rekening}}">
                                @csrf
                                @method('delete')
                                <button type="button" onclick="confirmDelete('{{$item->kode_rekening}}')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <script>
            function confirmDelete(kode_rekening){
                if (confirm('Anda yakin untuk menghapus data ini?')){
                    document.getElementById('delete-' + kode_rekening).submit();
                } else {
                    console.log('Penghapusan dibatalkan');
                }
            }
        </script>

@endsection