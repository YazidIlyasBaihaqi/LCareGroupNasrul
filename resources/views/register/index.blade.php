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
          
                          <form>
          
                            <div class="d-flex align-items-center mb-3 pb-1">
                                <span class="h1 fw-bold mb-0">USER REGISTRASI</span>
                            </div>
                            
                            <div class="form-outline">
                              <label class="form-label" for="nama">Nama</label>
                              <input type="nama" id="nama" class="form-control form-control-lg" />
                            </div>
          
                            <div class="form-outline">
                              <label class="form-label" for="password">Password</label>
                              <input type="password" id="password" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-1">
                              <label class="form-label" for="email">Email</label>
                              <input type="email" id="email" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-1">
                              <label class="form-label" for="usia">Usia</label>
                              <input type="usia" id="usia" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-1">
                              <label class="form-label" for="nomor">Nomor HP</label>
                              <input type="nomor" id="nomor" class="form-control form-control-lg" />
                            </div>

                            <div class="form-outline mb-1">
                              <label class="form-label" for="alamat">Alamat</label>
                              <textarea type="alamat" id="alamat" class="form-control form-control-lg" style="height:75px;"/></textarea>
                            </div>

                            <div class="mb-4 form-outline">
                                <label class="form-label" for="gender">Pilih gender</label>
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="gender" id="gender1">
                                    <label class="form-check-label" for="gender1">
                                      Perempuan
                                    </label>
                                </div>
              
                                <div class="form-check col-6">
                                    <input class="form-check-input" type="radio" name="gender" id="gender2">
                                    <label class="form-check-label" for="gender2">
                                      Laki - Laki
                                    </label>
                                </div>
                            </div>
                            <div class="pt-1 mb-4">
                              <button class="btn btn-dark btn-lg btn-block" type="button">Registrasi</button>
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

