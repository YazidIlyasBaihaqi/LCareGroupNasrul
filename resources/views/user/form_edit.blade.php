@extends('layouts.index')
@section('content')
    <div class="col-9 text-center" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="
              @if ($user->role == "Admin")
                {{url('/admin')}}
                @else
                    {{url('/home')}}
                @endif">Home</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">/</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 active" href="{{url('/user')}}">Profile</a>
            </li>
          </ul>
        <h3>User Profile</h3>
        @if (isset($user->foto))
            <img src="{{asset('assets/imgs/'.$user->foto)}}" class="img-thumbnail rounded mb-2" alt="user profile" width="25%" height="auto">
        @else
            <img src="{{asset('assets/imgs/user-png.png')}}" class="img-thumbnail rounded mb-2" alt="..." width="25%" height="auto">
        @endif
        @if ($errors->any())
            <div class="alert alert-danger text-start">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('user.update',$user->id) }}" id="userForm" data-sb-form-api-token="API_TOKEN" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-floating mb-3"">
                <input type="nama" id="nama" name="user" class="form-control form-control-lg" value="{{$user->user}}" placeholder="Nama"/>
                <label class="form-label" for="nama">Nama</label>
            </div>
    
            <div class="form-floating mb-3">
                <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{$user->email}}" placeholder="Email" />
                <label class="form-label" for="email" >Email</label>
            </div>
    
            <div class="form-floating mb-3">
                <input type="tgl_lahir" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-lg" value="{{$user->tgl_lahir}}" placeholder="Email" />
                <label class="form-label" for="tgl_lahir" >Tanggal Lahir</label>
            </div>
    
            <div class="form-floating mb-3">
                <input type="nomor" id="nomor" name="hp" class="form-control form-control-lg" value="{{$user->hp}}" placeholder="Nomor HP" />
                <label class="form-label" for="nomor" >Nomor HP</label>
            </div>
    
            <div class="form-floating mb-3">
                <textarea type="alamat" id="alamat" name="alamat" class="form-control form-control-lg" style="height:75px;" placeholder="Alamat"/ > {{$user->alamat}}</textarea>
                <label class="form-label" for="alamat" >Alamat</label>
            </div>
    
            <div class="form-floating mb-3">
                <input class="form-control" name="foto" value="" id="foto" type="file" placeholder="Foto" data-sb-validations="required" />
                <label for="foto">Foto</label>
                <div class="invalid-feedback" data-sb-feedback="foto:required">Foto is required.</div>
            </div>
    
            <select class="form-select form-floating mb-3" name="gender" aria-label="Default select example">
                <option value="p" @if ($user->gender == 'L')
                    @selected(true)
                @endif>Perempuan</option>
                <option value="L" @if ($user->gender == 'P')
                    @selected(true)
                @endif>Laki laki</option>
            </select>
    
            <div class="pt-1 mb-4 text-start">
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <a class="btn btn btn-block btn-secondary" name="unproses" href="{{url('/user')}}">Kembali</a>
            </div>
        </form>
    </div>
@endsection
