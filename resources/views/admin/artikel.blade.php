@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <h3>Daftar Artikel</h3>
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
        <p>{{ $message }}</p>
        </div>
        @endif
        <br />
        </a>
        <a href="{{ route('artikel.create') }}" class="btn btn-primary">Tambah</a>
        <div class="container mt-3">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Editor</th>
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($datas as $item)
                <tbody>
                    <th>{{ $no }}</th>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->deskripsi }}</td>
                    <td>{{ $item->editor }}</td>
                    <td>{{ $item->foto }}</td>
                    <td>
                        <form method="POST" action="">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="" title="ubah">   
                              <i class="bi bi-pencil-fill"></i>
                            </a>
                            <!-- hapus data -->
                            <button class="btn btn-danger" type="submit" title="Hapus"
                            name="proses" value="hapus"
                            onclick="return confirm('Anda Yakin Data Dihapus?')">    
                            <i class="bi bi-trash-fill"></i>
                          </button>
                    </td>
                </tbody>
            @php    $no++    @endphp
            @endforeach
            </table>
        </div>
    </div>
@endsection
