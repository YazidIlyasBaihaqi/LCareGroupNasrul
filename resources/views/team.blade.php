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
                <p class="card-text">Yazid Ilyas Baihaqi</p>
            </div>
          </div>
        </div>        
        <div class="col mb-4">
            <div class="card d-flex justify-content-center align-items-center">
              <img class="card-img-top" src="{{asset('/assets/imgs/Rio.jpg')}}" style="height:200px;width:150px;">
              <h5 class="card-title">Backend</h5>
              <div class="card-body">
                  <p class="card-text">Rio Bayu</p>
              </div>
            </div>
          </div>
        <div class="col mb-4">
          <div class="card d-flex justify-content-center align-items-center">
            <img src="..." class="card-img-top" alt="...">
            <h5 class="card-title">Backend</h5>
            <div class="card-body">
                <p class="card-text">M. Aldi</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card d-flex justify-content-center align-items-center">
            <img src="..." class="card-img-top" alt="...">
            <h5 class="card-title">UI dan Design</h5>
            <div class="card-body">
                <p class="card-text">Eka Rahma</p>
            </div>
          </div>
        </div>
        <div class="col mb-4">
            <div class="card d-flex justify-content-center align-items-center">
              <img src="..." class="card-img-top" alt="...">
              <h5 class="card-title">UI dan Design</h5>
              <div class="card-body">
                  <p class="card-text">Maulana Aji</p>
              </div>
            </div>
          </div>
    </div>
      
        {{-- <div class="row text-center">
            <div class="col card-columns d-flex justify-content-center">
                <div class="card text-center" style="width: 50%;">
                    <h3>Frontend</h3>
                    <div class="card-body">
                        <img class="card-img-top" src="{{asset('/assets/imgs/Yazid.png')}}" style="height:200px;width:150px;">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="col-9 card text-center" style="width: 50%;">
                <h3>Backend</h3>
                <div class="row">
                    <div class="col-6 card-body">
                        <img class="card-img-top" src="{{asset('/assets/imgs/Yazid.png')}}" alt="">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    <div class="col-6 card-body">
                        <img class="card-img-top" src="{{asset('/assets/imgs/Yazid.png')}}" alt="">
                        <h5 class="card-title">Special title treatment</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>
@endsection