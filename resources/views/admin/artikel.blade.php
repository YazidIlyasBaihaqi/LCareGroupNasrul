@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <div class="container mt-3">
            <h3>Daftar Artikel</h3>
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
            <p>{{ $message }}</p>
            </div>
            @endif
            </a>
            <a href="{{ route('artikel.create') }}" class="btn btn-primary">
                <i class="bi bi-plus"></i>
            </a>
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
                            <form method="POST" action="{{route('artikel.destroy', $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-info" href="{{ route('artikel.show', $item->id) }}" title="detail">
                                    <i class="bi bi-eye-fill"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('artikel.edit', $item->id)}}" title="ubah">   
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <!-- hapus data -->
                                <button class="btn btn-danger" type="submit" title="Hapus"
                                name="proses" value="hapus"
                                onclick="return confirm('Anda Yakin Data Dihapus?')">    
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tbody>
                @php    $no++    @endphp
                @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
