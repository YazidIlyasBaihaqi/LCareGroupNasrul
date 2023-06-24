<!doctype html>
<html lang="en">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/05f9e72f4d.js" crossorigin="anonymous"></script>

	</head>
	<body>
        <section class="" style="background-color: #76DEB7;">
            <div class="container py-5 h-100 ">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-xl-10">
                  <div class="card shadow" style="border-radius: 1rem;">
                    <div class="row g-0">
                      <div class="col-md-6 col-lg-5 d-none d-md-block">
                        <img src="{{asset('assets/imgs/Lansia UI 2.png')}}"
                          alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem; height:100%;" />
                      </div>
                      <div class="col-md-6 col-lg-7 d-flex align-items-center">
                        <div class="card-body p-4 p-lg-5 text-black">
                          @if ($errors->any())
                          <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                          @endif
                          <form method="POST" action="{{ route('user.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN">
                            @csrf
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">USER REGISTRASI</span>
                            </div>
                            
                            <div class="form-floating mb-3"">
                              <input type="nama" id="nama" name="user" class="form-control form-control-lg @error('nama') is-invalid @enderror" value="{{old('user')}}" placeholder="Nama"/>
                              <label class="form-label" for="nama">Nama</label>
                              @error('nama')
                                <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>
          
                            <div class="form-floating mb-3">
                              <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror" value="{{old('password')}}" placeholder="Password"/>
                              <label class="form-label" for="password" >Password</label>
                              @error('password')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            </div>

                            <div class="form-floating mb-3">
                              <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{old('email')}}" placeholder="Email"/>
                              <label class="form-label" for="email" >Email</label>
                              @error('email')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            </div>

                            <div class="form-floating mb-3">
                              <input class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{old('tgl_lahir')}}" id="tgl_lahir" type="date"
                                  placeholder="Tanggal Jadwal" data-sb-validations="required" />
                              <label for="tgl_lahir">Tanggal Lahir</label>
                              @error('tgl_lahir')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                          </div>

                            <div class="form-floating mb-3">
                              <input type="nomor" id="nomor" name="hp" class="form-control form-control-lg @error('hp') is-invalid @enderror" value="{{old('hp')}}" placeholder="Nomor HP"/>
                              <label class="form-label" for="nomor" >Nomor HP</label>
                              @error('hp')
                              <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                            </div>

                            <div class="form-floating mb-3">
                              <textarea type="alamat" id="alamat" name="alamat" class="form-control form-control-lg @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" style="height:75px;" placeholder="Alamat"/></textarea>
                              <label class="form-label" for="alamat" >Alamat</label>
                            </div>

                            <div class="mb-4 form-outline @error('gender') is-invalid @enderror">
                                <label class="form-label" for="gender">Pilih gender</label>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="gender" id="gender1" value="P">
                                    <label class="form-check-label" for="gender1">
                                      Perempuan
                                    </label>
                                </div>
              
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="gender" id="gender2" value="L">
                                    <label class="form-check-label" for="gender2">
                                      Laki - Laki
                                    </label>
                                </div>
                                @error('gender')
                                <div class="invalid-feedback">{{$message}}</div>
                              @enderror
                            </div>
                            
                            <div class="pt-1 mb-4">
                              <button class="btn btn-dark btn-lg btn-block" type="submit">Registrasi</button>
                              <a class="btn btn-lg btn-block btn-secondary" name="unproses" href="{{ url('/')}}">Kembali</a>
                            </div>

                          </form>
          
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

	</body>
</html>

