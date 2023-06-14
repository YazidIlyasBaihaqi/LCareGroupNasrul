@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <div class="container mt-3">
            <h3>Dokumen Medis</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-lg-12">
                <a href="{{route('dokumed.create')}}" class="btn btn-primary btn-rounded btn-fw">Tambah Data</a>
            </div>
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
                        <form method="POST" action="{{route('dokumed.destroy' , $item->id)}}">
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-warning" href="{{route('dokumed.edit' , $item->id)}}" title="ubah">   
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
