@extends('layouts.index')
@section('content')
    <div class="m-1" style="background-color:#fffafa; width:73%;">
        <div class="container mt-3">
            <h5>Home</h5>
            <div class="images row">
                <div class="col mx-3 my-3 bg-secondary d-flex align-items-center justify-content-center">
                    <a class="text-decoration-none fs-2 text-center text-dark" href="{{url("/jadwal")}}">Jadwal</a>
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
            <h5>Artikel</h5>
            <div class="cards row d-flex justify-content-center">
                <div class="card col-md-3 m-3">
                    <img src="https://picsum.photos/200" class="card-img-top" alt="...">
                    <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
