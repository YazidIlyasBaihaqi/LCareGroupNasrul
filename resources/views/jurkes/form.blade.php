@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <h3>Form Jurnal Kesehatan</h3>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('jurkes.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN"
            enctype="multipart/form-data">
            @csrf
            <div class="form-floating mb-3">
                <input class="form-control" name="entry_date" value="" id="entry_date" type="date"
                    placeholder="Tanggal Jadwal" data-sb-validations="required" />
                <label for="entry_date">Tanggal Entri</label>
                <div class="invalid-feedback" data-sb-feedback="entry_date:required">entry date is required.</div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="aktivitas" rows="5"></textarea>
                <label for="aktivitas">Aktivitas</label>
                <div class="invalid-feedback" data-sb-feedback="aktivitas:required">care notes is required.</div>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="exampleFormControlTextarea1" name="care_notes" rows="5"></textarea>
                <label for="care_notes">Care Notes</label>
                <div class="invalid-feedback" data-sb-feedback="care_notes:required">care notes is required.</div>
            </div>
            <input class="form-control invisible" name="user_id" value="{{ $user->id }}" id="user_id" type="text"
                placeholder="Foto" data-sb-validations="required" />

            <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
            <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
            <a class="btn btn-secondary" name="unproses" href="{{ route('jurkes.index')}}">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
