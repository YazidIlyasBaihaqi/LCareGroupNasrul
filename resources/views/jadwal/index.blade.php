@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;"">
        <div class="container mt-3">
            <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link p-1" href="
                    @if ($user->role == "Admin")
                        {{url('/admin')}}
                    @else
                        {{url('/home')}}
                    @endif">Home</a> 
                </li>
                <li class="nav-item">
                  <a class="nav-link p-1" href="#">/</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link p-1 active" href="#">Profile</a>
                </li>
              </ul>
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
            <p class="mt-1">Masukkan data sesuai pada tanggal dengan contoh <br>
            Pemakaian obat tanggal 10/02/2023 dengan jeda 10 hari</p>
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        @if ($user -> role =='Admin')
                            <th>User</th>
                        @else
                            <th>Nama User</th>
                        @endif
                        <th>Kode</th>
                        <th>Kegiatan</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($ar_jadwal as $data)
                        <tr>
                            <th>{{ $no }}</th>
                            @if ($user -> role =='Admin')
                                <td>{{ $data->user }}</td>
                            @else
                                <td>{{ $data->nama }}</td>
                            @endif
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
