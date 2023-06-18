@extends('layouts.index')
@section('content')
<div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
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
                <a class="nav-link p-1 active" href="{{url('/jadwal')}}">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1" href="#">/</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1 active" href="#">Form Jadwal</a>
                </li>
            </ul>
            <h3>Form Edit Jadwal</h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('jadwal.update', $data->id) }}" id="contactForm"
                data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-floating mb-3">
                    <input class="form-control" name="kode" value="{{ $data->kode }}" id="kode" type="text"
                        placeholder="Kode Jadwal" data-sb-validations="required" />
                    <label for="kode">Kode</label>
                    <div class="invalid-feedback" data-sb-feedback="kode:required">kode is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="kegiatan" value="{{ $data->kegiatan }}" id="kegiatan" type="text"
                        placeholder="Kegiatan Jadwal" data-sb-validations="required" />
                    <label for="kegiatan">Kegiatan</label>
                    <div class="invalid-feedback" data-sb-feedback="kegiatan:required">kegiatan is required.</div>
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="tanggal" value="" id="tanggal" type="date"
                        placeholder="Tanggal Jadwal" data-sb-validations="required" />
                    <label for="tanggal">Tanggal</label>
                    <div class="invalid-feedback" data-sb-feedback="tanggal:required">tanggal is required.</div>
                </div>
    
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
                <a class="btn btn-secondary" name="unproses" href="{{ url('/jadwal ')}}">Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
