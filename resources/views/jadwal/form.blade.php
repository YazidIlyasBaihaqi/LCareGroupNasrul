@extends('layouts.index')
@section('content')
    <div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <div class="container mt-3">
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
                  <a class="nav-link p-1 active" href="{{url('/jadwal')}}">Jadwal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link p-1" href="#">/</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link p-1 active" href="#">Form Jadwal</a>
                  </li>
              </ul>
            <h3>Form Jadwal</h3>
            {{-- @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form method="POST" action="{{ route('jadwal.store') }}" id="contactForm" data-sb-form-api-token="API_TOKEN"
                enctype="multipart/form-data">
                @csrf
                <div class="form-floating mb-3">
                    <input class="form-control @error('kode') is-invalid @enderror" name="kode" value="" id="kode" type="text"
                        placeholder="Kode Jadwal" value="{{old('kode')}}" />
                    <label for="kode">Kode</label>
                    @error('kode')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control @error('kegiatan') is-invalid @enderror" id="exampleFormControlTextarea1" name="kegiatan" rows="5">{{old('kegiatan')}}</textarea>
                    <label for="kegiatan">Kegiatan</label>
                    @error('kegiatan')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="form-floating mb-3">
                    <input class="form-control" name="tanggal" value="" id="tanggal" type="date"
                        placeholder="Tanggal Jadwal" data-sb-validations="required" />
                    <label for="tanggal">Tanggal</label>
                    <div class="invalid-feedback" data-sb-feedback="tanggal:required">tanggal is required.</div>
                </div>
                <input class="form-control invisible" name="user_id" value="{{ $user->id }}" id="user_id" type="text"
                    placeholder="Foto" data-sb-validations="required" />
                
                <button class="btn btn-primary" name="proses" value="simpan" id="simpan" type="submit">Simpan</button>
                <button class="btn btn-info" name="unproses" value="batal" id="batal" type="reset">Batal</button>
                <a class="btn btn-secondary" name="unproses" href="{{ url('/jadwal ')}}">Kembali</a>
            </form>
        </div>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
