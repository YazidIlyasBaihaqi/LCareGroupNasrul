@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <div class="container mt-3">
            <h5>Admin</h5>
            <div class="row">
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{url("/jadwal")}}">user</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center" style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{url("/dakes")}}">Pemantauan Kesehatan</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{url("/jurkes")}}">Jurnal Perawatan</a>
                </div>
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center" style="height: 200px; width: 200px; border-radius: 15px;">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{url("/dokumed")}}">Dokumen Medis</a>
                </div>
            </div>
            <h5>Edit Artikel</h5>
            <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center" style="height: 200px; width: 200px; border-radius: 15px;">
                <a class="text-decoration-none fs-2 text-center text-dark" href="{{ route('artikel.index') }}">Edit Artikel</a>
            </div>
        </div>
    </div>
@endsection
