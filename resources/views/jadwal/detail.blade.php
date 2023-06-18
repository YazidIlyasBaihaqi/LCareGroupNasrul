@extends('layouts.index')
@section('content')
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <div class="card col-9" style="background-color:#fffafa; border-style: solid; border-color: #A7D7C5;">
        <div class="card-body">
            <h5 class="card-title">{{ $rs->kode }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">tanggal {{ $rs->tanggal }}</h6>
            <p class="card-text">Melakukan {{ $rs->kegiatan }}</p>
            <a href="{{ url('/jadwal') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
