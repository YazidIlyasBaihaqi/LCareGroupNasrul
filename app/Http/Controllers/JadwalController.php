<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\jadwaljuduljuduldeskripseideskripsiudserse\Eloquent\Model;
use App\Exports\JadwalExport;
use Barryvdh\DomPDF\Facade\Pdf as DomPDF;
use Maatwebsite\Excel\Facades\Excel;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $ar_jadwal = DB::table('jadwal')
                ->join('user', 'user.id', '=', 'jadwal.user_id')
                ->select('jadwal.*', 'user.user as nama')
                ->orderBy('jadwal.id', 'desc')
                ->get();
        } else {
            $id = Auth::user()->id;
            $ar_jadwal = Jadwal::where('user_id', $id)
                ->join('user', 'user.id', '=', 'jadwal.user_id')
                ->select('jadwal.*', 'user.user as nama')
                ->orderBy('jadwal.id', 'desc')
                ->get();
        }
        $user = Auth::user();

        return view('jadwal.index', compact('ar_jadwal', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        //arahkan ke form input data
        return view('jadwal.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => 'required',
                'kode' => 'required',
                'kegiatan' => 'required',
                'tanggal' => 'required',
            ],
            //custom pesan errornya
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kegiatan.required' => 'Kegiatan Wajib Diisi',
                'tanggal.required' => 'Tanggal Wajib Diisi',
            ]
        );

        DB::table('jadwal')->insert(
            [
                'user_id' => Auth::user()->id,
                'kode' => $request->kode,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
            ]
        );

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = Auth::user();
        $rs = Jadwal::find($id);
        return view('jadwal.detail', compact('rs', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $data = Jadwal::find($id);
        return view('jadwal.form_edit', compact('data', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                // 'user_id' => 'required',
                'kode' => 'required',
                'kegiatan' => 'required',
                'tanggal' => 'required',
            ],
            //custom pesan errornya
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kegiatan.required' => 'Kegiatan Wajib Diisi',
                'tanggal.required' => 'Tanggal Wajib Diisi',
            ]
        );

        DB::table('jadwal')->where('id', $id)->update(
            [
                // 'user_id' => Auth::user()->id,
                'kode' => $request->kode,
                'kegiatan' => $request->kegiatan,
                'tanggal' => $request->tanggal,
            ]
        );

        return redirect()->route('jadwal.index')
            ->with('success', 'Jadwal Dengan Kode ' . $id . 'Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Jadwal::where('id', $id)->delete();
        return redirect()->route('jadwal.index')
            ->with('success', 'Data Berhasil Dihapus');
    }

    public function jadwalPDF()
    {
        $ar_jadwal = Jadwal::all(); //eloquent
        $pdf = DomPDF::loadView(
            'jadwal.jadwal_pdf',
            ['ar_jadwal' => $ar_jadwal]
        );
        return $pdf->download('data_jadwal_' . date('d-m-Y') . '.pdf');
    }

    public function jadwalExcel()
    {
        return Excel::download(new JadwalExport, 'data_jadwal_' . date('d-m-Y') . '.xlsx');
    }
}
