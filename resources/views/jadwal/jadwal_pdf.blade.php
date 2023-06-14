<h3 align="center">Daftar Produk</h3>
<table border="1" align="center" cellpadding="10" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>No</th>
            {{-- <th>Nama User</th> --}}
            <th>Kode</th>
            <th>Kegiatan</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($ar_jadwal as $data)
            <tr>
                <th>{{ $no }}</th>
                {{-- <td>{{ $data->nama }}</td> --}}
                <td>{{ $data->kode }}</td>
                <td>{{ $data->kegiatan }}</td>
                <td>{{ $data->tanggal }}</td>
            </tr>
            @php $no++ @endphp
        @endforeach
    </tbody>
</table>
