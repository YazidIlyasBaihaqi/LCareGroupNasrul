@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <div class="container mt-3">
            <h3>Jadwal Harian</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <a href="{{ route('jadwal.create') }}" class="btn btn-primary" title="Tambah jadwal">
                <i class="bi bi-plus"></i>
            </a>

            <a href="{{ url('/jadwal-pdf') }}" class="btn btn-danger" title="Export to PDF">
                <i class="bi bi-file-earmark-pdf-fill"></i>
            </a>

            <a href="{{ url('/jadwal-excel') }}" class="btn btn-success" title="Export to Excel">
                <i class="bi bi-file-earmark-excel-fill"></i>
            </a>
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama User</th>
                        <th>Kode</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($ar_jadwal as $data)
                        <tr>
                            <th>{{ $no }}</th>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->kode }}</td>
                            <td>{{ $data->kegiatan }}</td>
                            <td>{{ $data->tanggal }}</td>
                            <td>
                                <form method="POST" action="{{ route('jadwal.destroy', $data->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <a class="btn btn-info" href="{{ route('jadwal.show', $data->id) }}" title="detail">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a class="btn btn-warning" href="{{ route('jadwal.edit', $data->id) }}" title="ubah">
                                        <i class="bi bi-pencil-fill"></i>
                                    </a>
                                    <!-- hapus data -->
                                    <button class="btn btn-danger" type="submit" title="Hapus" name="proses"
                                        value="hapus" onclick="return confirm('Anda Yakin Data Dihapus?')">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                    <input type="hidden" name="idx" value="" />
                                </form>
                            </td>
                        </tr>
                        @php $no++ @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
