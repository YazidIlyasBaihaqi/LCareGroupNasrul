<div class="cards row d-flex justify-content-center">
    <div class="card col-md-3 m-3">
        <img src="{{asset('assets/imgs/artikel/' . $artikel->foto)}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $artikel->judul}}</h5>
          <p class="card-text">{{ $artikel->deskripsi}}</p>
          <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>