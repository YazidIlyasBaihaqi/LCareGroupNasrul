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
    <form method="POST" action="{{ route('jurkes.update',$data->id) }}" id="dokumedForm" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
    @csrf
    @method('PUT')    
        <div class="form-floating mb-3">
            <input class="form-control" name="aktivitas" value="{{$data->aktivitas}}" id="aktivitas" type="text" placeholder="Tipe Dokumen" data-sb-validations="required" />
            <label for="aktivitas">Aktivitas</label>
            <div class="invalid-feedback" data-sb-feedback="entry_date:required">Durasi Tidur is required.</div>
        </div>
        
        <div class="form-floating mb-3">
            <input class="form-control" name="care_notes" value="{{$data->care_notes}}" id="care_notes" type="text" placeholder="Tipe Dokumen" data-sb-validations="required" />
            <label for="care_notes">Catatan</label>
            <div class="invalid-feedback" data-sb-feedback="care_notes:required">Durasi Tidur is required.</div>
        </div>

        <div class="form-floating mb-3">
            <input class="form-control" name="entry_date" value="" id="entry_date" type="date"
                placeholder="Tanggal Jadwal" data-sb-validations="required" />
            <label for="entry_date">Tanggal</label>
            <div class="invalid-feedback" data-sb-feedback="entry_date:required">tanggal is required.</div>
        </div>

        <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
        <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
        <a href="{{route('dokumed.index')}}" class="btn btn-light pull-right">Kembali</a>
        
    </form>
  </div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</div>
@endsection