@extends('../layouts.main')

@section('container')

        <h1>Daftar Transaksi</h1>
        <button class="tambah-data"><a href="/transaksi/tambah-data">Tambah Data</a></button>
        <div class="search-feature">
            <form action="{{route('cari-data-transaksi')}}" method="get" class="search">
                <label for="search">Cari: </label><input type="text" name="search" class="input-search" placeholder="Ketik Nama Rekening">
                <input type="submit" value="Cari">
            </form>
            <form action="{{route('transaksi')}}" method="GET" class="refresh">
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
                <th>Nama Rekening</th>
                <th>Tanggal Setor</th>
                <th>Jumlah Setor</th>
                <th>Aksi</th>
                </tr>

                @foreach($data as $item)
                <tr>
                <td>{{ $item->kode_rekening }}</td>
                <td>{{ $item->nama_rekening }}</td>
                <td>{{ $item->tgl_setor }}</td>
                <td>{{ $item->jumlah_setor}}</td>
                <td>
                        <div class="action-container">
                                <form action="{{route('edit-data-transaksi', $item->id_transaksi)}}">
                                        @csrf
                                        <button type="submit">Edit</button>
                                </form>
                                <form action="{{ route('hapus-data-transaksi', $item->id_transaksi) }}" method="post" id="delete-{{$item->id_transaksi}}">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" onclick="confirmDelete()">Hapus</button>
                                </form>
                        </div>
                </td>
                </tr>
                @endforeach

        </table>
        </div>
        <script>
        function confirmDelete(id_transaksi){
                if (confirm('Anda yakin untuk menghapus data ini?')){
                    document.getElementById('delete-' + id_transaksi).submit();
                } else {
                    console.log('Penghapusan dibatalkan');
                }
            }
        </script>

@endsection