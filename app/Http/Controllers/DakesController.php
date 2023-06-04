<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Data_Kesehatan;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\artikeljuduljuduldeskripseideskripsiudserse\Eloquent\Model;

class DakesController extends Controller
{
    /**App\Http\Controllers\
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $datas = DB::table('data_kesehatan')
                ->join('user', 'user.id', '=', 'data_kesehatan.user_id')
                ->select('data_kesehatan.*', 'user.nama as pengguna')
                ->orderBy('data_kesehatan.id', 'desc')
                ->get();
        } else {
            $datas = Data_Kesehatan::get();
        }

        return view('dakes.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dakes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'detak_jantung' => 'required',
                'tekanan_darah' => 'required',
                'durasi_tidur' => 'required',
            ],
            //custom pesan errornya
            [
                'durasi_tidur.required' => 'Durasi Tidur Wajib Diisi',
                'tekanan_darah.required' => 'Tekanan Darah Wajib Diisi',
                'detak_jantung.required' => 'Detak Jantung Wajib Diisi',
            ]
        );

        DB::table('jurnal_kesehatan')->insert(
            [
                'durasi_tidur' => $request->entry_date,
                'tekanan_darah' => $request->aktifitas,
                'detak_jantung' => $request->care_notes,
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect()->route('dakes.index')
            ->with('success', 'Data Kesehatan Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Data_Kesehatan::find($id);
        return view('dakes.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Data_Kesehatan::find($id);
        return view('dakes.form_edit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'detak_jantung' => 'required',
                'tekanan_darah' => 'required',
                'durasi_tidur' => 'required',
            ],
            //custom pesan errornya
            [
                'durasi_tidur.required' => 'Durasi Tidur Wajib Diisi',
                'tekanan_darah.required' => 'Tekanan Darah Wajib Diisi',
                'detak_jantung.required' => 'Detak Jantung Wajib Diisi',
            ]
        );

        //lakukan update data dari request form edit
        DB::table('data_kesehatan')->where('id', $id)->update(
            [
                'durasi_tidur' => $request->entry_date,
                'tekanan_darah' => $request->aktifitas,
                'detak_jantung' => $request->care_notes,
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect('/dakes' . '/' . $id)
            ->with('success', 'Data Kesehatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data di database
        Data_Kesehatan::where('id', $id)->delete();
        return redirect()->route('dakes.index')
            ->with('success', 'Data Kesehatan Berhasil Dihapus');
    }
}
