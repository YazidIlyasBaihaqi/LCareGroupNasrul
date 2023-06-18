@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;"">
        <div class="container mt-3">
            <h3>Pemantauan Kesehatan</h3>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="col-lg-12">
                <a href="{{route('dakes.create')}}" class="btn btn-primary btn-rounded btn-fw">
                    <i class="bi bi-plus"></i>
                </a>
            </div>
            <div class="container mt-3">
                <table class="table table-hover datatable">
                    <thead>
                        <tr>
                            <th>No</th>
                            @if ($user -> role =='Admin')
                                <th>User</th>
                            @endif
                            <th>Tekanan Darah</th>
                            <th>Detak Jantung</th>
                            <th>Durasi Tidur</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                @php
                    $no = 1;
                @endphp
                @foreach ($datas as $item)
                    <tbody>
                        <th>{{ $no }}</th>
                        @if ($user -> role =='Admin')
                            <td>{{$item->pengguna}}</td>
                        @endif
                        <td>{{ $item->tekanan_darah }}</td>
                        <td>{{ $item->detak_jantung }} {{$statusDetak}}</td>
                        <td>{{ $item->durasi_tidur }} {{$statusDurasi}}</td>
                        <td>
                            <form method="POST" action="{{route('dakes.destroy' , $item->id)}}">
                                @csrf
                                @method('DELETE')
                                <a class="btn btn-warning" href="{{route('dakes.edit' , $item->id)}}" title="Ubah">   
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
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
    </div>
@endsection
