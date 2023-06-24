<div class="" style="background-color:#FFF2F2;">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between p-3">
        <div class="col-md-3 mb-2 mb-md-0">
            <h3 style="color: 76DEB7;">Halo Lansia</h3>
        </div>

        {{-- <div class="col-md-3 text-end">
            {{ $user -> user}}
            <a href="{{ url('logout') }}" class="btn btn-outline-primary me-2">Logout</a>
        </div> --}}
        <div class="dropdown">
            <button class=" dropdown-toggle border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (isset($user->foto))
                    <img src="{{asset('assets/imgs/'.$user->foto)}}" class="img-thumbnail rounded" alt="user profile" width="50px" height="auto">
                @else
                    <img src="{{asset('assets/imgs/user-png.png')}}" class="img-thumbnail rounded" alt="..." width="50px" height="auto">
                @endif
                {{ $user -> user}}
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="{{ url('/user')}}">Profile</a></li>
                <li><a class="dropdown-item" href="{{ url('logout') }}">Logout</a></li>
            </ul>
          </div>
    </div>
</div>