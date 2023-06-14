@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <h3>Jurnal Kesehatan</h3>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <a href="{{ route('jurkes.create') }}" class="btn btn-primary" title="Tambah jadwal">
            <i class="bi bi-plus"></i>
        </a>
        <div class="container mt-3">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Aktivitas</th>
                        <th>Catatan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            @php
                $no = 1;
            @endphp
            @foreach ($datas as $data)
                <tbody>
                    <th>{{ $no }}</th>
                    <td>{{ $data->aktivitas }}</td>
                    <td>{{ $data->care_notes }}</td>
                    <td>{{ $data->entry_date }}</td>
                    <td>
                        <form method="POST" action="{{ route('jurkes.destroy', $data->id) }}">
                            @csrf
                            @method('DELETE')
                            <a href="{{ url('/jurkes-pdf') }}" class="btn btn-danger" title="Export to PDF">
                                <i class="bi bi-file-earmark-pdf-fill"></i>
                            </a>
                            <a class="btn btn-warning" href="{{route('jurkes.edit', $data->id)}}" title="ubah">   
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
