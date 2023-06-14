@extends('layouts.index')
@section('content')
<div class="m-1" style="background-color:#fffafa; width:73%;">
    
    <h3>Form Dokumen Medis</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="container px-5 my-5">
    <form method="POST" action="{{ route('dokumed.store') }}" id="dokumedForm" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
    @csrf    
        <div class="form-floating mb-3">
            <input class="form-control" name="tipe_dokumen" value="" id="tipe_dokumen" type="text" placeholder="Tipe Dokumen" data-sb-validations="required" />
            <label for="tipe_dokumen">Tipe Dokumen</label>
            <div class="invalid-feedback" data-sb-feedback="tipe_dokumen:required">Durasi Tidur is required.</div>
        </div>
        <div class="form-floating mb-3">
            <input class="form-control" name="file_upload" value="" id="file_upload" type="file" placeholder="Foto" data-sb-validations="required" />
            <label for="file_upload">File Upload</label>
            <div class="invalid-feedback" data-sb-feedback="file_upload:required">Foto is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
        <a href="{{route('dokumed.index')}}" class="btn btn-light pull-right">Kembali</a>
        
    </form>
  </div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</div>
@endsection