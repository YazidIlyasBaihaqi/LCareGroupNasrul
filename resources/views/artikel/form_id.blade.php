@extends('layouts.index')
@section('content')
<div class="m-1" style="background-color:#fffafa; width:73%;">
    <h3>Form Produk</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('artikel.update',$data->id) }}" id="contactForm" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
    @csrf
    @method('PUT')    
        <div class="form-floating mb-3">
            <input class="form-control" name="judul" value="{{ $data->judul}}" id="Judul" type="text" placeholder="Kode Produk" data-sb-validations="required" />
            <label for="Judul">Judul</label>
            <div class="invalid-feedback" data-sb-feedback="judul:required">Kode Produk is required.</div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="5"></textarea>
            <label for="deskripsi">Deskripsi</label>
            <div class="invalid-feedback" data-sb-feedback="deksripsi:required">Deskripsi is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="Foto" data-sb-validations="required" />
            <label for="foto">Foto</label>
            <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
        </div>
        
        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
        
    </form>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection