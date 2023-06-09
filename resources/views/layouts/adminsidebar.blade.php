<div class="d-flex flex-column flex-shrink-0 p-3 col-3" style="background-color: #fffafa; border-style: solid; border-color: #A7D7C5;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
        <a href="{{url('/admin')}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Admin
        </a>
        </li>
        <li>
        <a href="{{url("/jadwal")}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"></use></svg>
            Jadwal
        </a>
        </li>
        <li>
        <a href="{{url("/dakes")}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"></use></svg>
            Pemantauan Kesehatan
        </a>
        </li>
        <li>
        <a href="{{url("/jurkes")}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"></use></svg>
            Jurnal Perawatan
        </a>
        </li>
        <li>
        <a href="{{url("/dokumed")}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
            Dokumen Medis
        </a>
        <a href="{{route('artikel.index')}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
            Artikel
        </a>
        <a href="{{url('/team')}}" class="nav-link mb-3 " style="color:black;">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"></use></svg>
            Team
        </a>
        </li>
    </ul>
</div>