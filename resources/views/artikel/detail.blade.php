@extends('layouts.index')
@section('content')
<div class="col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
    <div class="container mt-3">
        <ul class="nav">
            <li class="nav-item">
              <a class="nav-link p-1" href="
                @if ($user->role == "Admin")
                    {{route('artikel.index')}}
                @else
                    {{url('/home')}}
                @endif">Back</a> 
            </li>
            <li class="nav-item">
              <a class="nav-link p-1" href="#">/</a>
            </li>
            <li class="nav-item">
              <a class="nav-link p-1 active" href="#">Artikel</a>
            </li>
        </ul>
        <img src="{{asset('assets/imgs/artikel/' . $data->foto)}}" width="50%" height="auto" alt="...">
        <h5 class="mt-2">{{ $data->judul}}</h5>
        <p>{{$data->deskripsi}}</p>
    </div>
</div>
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection