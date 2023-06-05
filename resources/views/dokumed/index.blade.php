@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <div class="container mt-3">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tipe Dokumen</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($datas as $item)
                <tbody>
                    <th>{{ $no }}</th>
                    <td>{{ $item->tipe_dokumen }}</td>
                    <td>{{ $item->file_upload }}</td>
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
