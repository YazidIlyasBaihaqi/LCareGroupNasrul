@extends('layouts.index')
@section('content')
    {{-- @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif --}}
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{ $rs->kode }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{ $rs->tanggal }}</h6>
            <p class="card-text">Kegiatan hari ini adalah {{ $rs->kegiatan }}</p>
            <a href="{{ url('/jadwal') }}" class="btn btn-primary">Go Back</a>
        </div>
    </div>
@endsection
