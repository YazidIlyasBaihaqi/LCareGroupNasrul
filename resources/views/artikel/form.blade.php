@extends('layouts.index')
@section('content')
<div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
    <div class="container mt-3">
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
    <form method="POST" action="{{ route('artikel.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
    @csrf    
        <div class="form-floating mb-3">
            <input class="form-control" name="judul" value="" id="Judul" type="text" placeholder="Kode Produk" data-sb-validations="required" />
            <label for="Judul">Judul</label>
            <div class="invalid-feedback" data-sb-feedback="judul:required">Judul is required.</div>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="deskripsi" rows="5"></textarea>
            <label for="deskripsi">Deskripsi</label>
            <div class="invalid-feedback" data-sb-feedback="deksripsi:required">Judul is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="Foto" data-sb-validations="required" />
            <label for="foto">Foto</label>
            <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
        </div>
            <input class="form-control invisible" name="user_id" value="{{ $user -> id}}" id="user_id" type="text" placeholder="Foto" data-sb-validations="required" />
        
        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
        
    </form>
    </div>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection