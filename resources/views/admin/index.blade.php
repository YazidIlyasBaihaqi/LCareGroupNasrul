@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <div class="container mt-3">
            <h5>Admin</h5>
            <div class="row">
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center"
                    style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{ url('/jadwal') }}">Edit jadwal</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center"
                    style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{ url('/dakes') }}">Edit Pemantauan
                        Kesehatan</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center"
                    style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{ url('/jurkes') }}">Edit Jurnal
                        Perawatan</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center"
                    style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{ url('/dokumed') }}">Edit Dokumen
                        Medis</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center"
                style="height: 200px; width: 200px; border-radius: 15px;">
                <a class="text-decoration-none fs-2 text-center text-dark" href="{{ route('artikel.index') }}">Edit
                    Artikel</a>
                </div>
            </div>
        </div>
    </div>
@endsection
