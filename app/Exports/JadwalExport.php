<?php

namespace App\Exports;

use App\Models\Jadwal;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class JadwalExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        //return jadwal::all();
        $ar_jadwal = Jadwal::join('user', 'user.id', '=', 'jadwal.user_id')
            ->select(
                'user.user AS nama',
                'jadwal.kode',
                'jadwal.kegiatan',
                'jadwal.tanggal'
            )
            ->get();

        return $ar_jadwal;
    }

    public function headings(): array
    {
        return ["User", "Kode", "Kegiatan", "Tanggal"];
    }
}
