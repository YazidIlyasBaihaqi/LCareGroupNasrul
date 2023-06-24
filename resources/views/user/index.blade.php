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
              <a class="nav-link p-1 active" href="#">Profile</a>
            </li>
          </ul>
        <h3>User Profile</h3>
        @if (isset($user->foto))
            <img src="{{asset('assets/imgs/'.$user->foto)}}" class="img-thumbnail rounded mb-2" alt="user profile" width="25%" height="auto">
        @else
            <img src="{{asset('assets/imgs/user-png.png')}}" class="img-thumbnail rounded mb-2" alt="..." width="25%" height="auto">
        @endif
        <div class="form-floating mb-3"">
            <input type="nama" id="nama" name="user" class="form-control form-control-lg" value="{{$user->user}}" placeholder="Nama" disabled/>
            <label class="form-label" for="nama">Nama</label>
        </div>

        <div class="form-floating mb-3">
            <input type="email" id="email" name="email" class="form-control form-control-lg" value="{{$user->email}}" placeholder="Email" disabled/>
            <label class="form-label" for="email" >Email</label>
        </div>

        <div class="form-floating mb-3">
            <input type="tgl_lahir" id="tgl_lahir" name="tgl_lahir" class="form-control form-control-lg" value="{{$user->tgl_lahir}}" placeholder="Email" disabled/>
            <label class="form-label" for="tgl_lahir" >Tanggal Lahir</label>
        </div>

        <div class="form-floating mb-3">
            <input type="nomor" id="nomor" name="hp" class="form-control form-control-lg" value="{{$user->hp}}" placeholder="Nomor HP" disabled/>
            <label class="form-label" for="nomor" >Nomor HP</label>
        </div>

        <div class="form-floating mb-3">
            <textarea type="alamat" id="alamat" name="alamat" class="form-control form-control-lg" style="height:75px;" placeholder="Alamat"/ disabled> {{$user->alamat}}</textarea>
            <label class="form-label" for="alamat" >Alamat</label>
        </div>

        <div class="form-floating mb-3">
            <textarea type="gender" id="gender" name="gender" class="form-control form-control-lg" style="height:75px;" placeholder="Alamat"/ disabled> {{$user->gender}}</textarea>
            <label class="form-label" for="gender" >Gender</label>
        </div>
        <div class="pt-1 mb-4 text-start">
            <a class="btn btn-lg btn-block btn-secondary" name="unproses" href="{{ route('user.edit', $user->id)}}">Edit</a>
        </div>
    </div>
@endsection
