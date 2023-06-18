@extends('layouts.index')
@section('content')
<div class="m-1" style="background-color:#fffafa; width:73%;">
 <div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
          <div class="card d-flex justify-content-center align-items-center">
            <img class="card-img-top" src="{{asset('/assets/imgs/Yazid.png')}}" style="height:200px;width:150px;">
            <h5 class="card-title">Frontend</h5>
            <div class="card-body">
                <p class="card-text">Yazid Ilyas Baihaqi / STT Terpadu Nurul Fikri</p>
            </div>
          </div>
        </div>        
        <div class="col mb-4">
            <div class="card d-flex justify-content-center align-items-center">
              <img class="card-img-top" src="{{asset('/assets/imgs/Rio.jpg')}}" style="height:200px;width:150px;">
              <h5 class="card-title">Backend</h5>
              <div class="card-body">
                  <p class="card-text">Rio Bayu / STMIK Sinar Nusantara Surakarta</p>
              </div>
            </div>
          </div>
        <div class="col mb-4">
          <div class="card d-flex justify-content-center align-items-center">
            <img src="{{asset('/assets/imgs/Aldi.jpg')}}" class="card-img-top" alt="..." style="height:200px;width:150px;">
            <h5 class="card-title">Backend</h5>
            <div class="card-body">
                <p class="card-text">M. Aldi Kurniawan / Universitas Lampung</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card d-flex justify-content-center align-items-center">
            <img src="{{asset('/assets/imgs/Eka.jpg')}}" class="card-img-top" alt="..." style="height:200px;width:150px;">
            <h5 class="card-title">UI dan Design</h5>
            <div class="card-body">
                <p class="card-text">Eka Rahmawati / STT terpadu Nurul Fikri</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
            <div class="card d-flex justify-content-center align-items-center">
              <img src="{{asset('/assets/imgs/Maulana.jpg')}}" class="card-img-top" alt="..." style="height:200px;width:150px;">
              <h5 class="card-title">UI dan Design</h5>
              <div class="card-body">
                  <p class="card-text">Maulana Aji</p>
              </div>
            </div>
          </div>
    </div>
    </div>
</div>
@endsection