<?php

namespace App\Http\Controllers;

use App\Models\Jurnal_Kesehatan;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\artikeljuduljuduldeskripseideskripsiudserse\Eloquent\Model;

class JurkesController extends Controller
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
            $datas = DB::table('jurnal_kesehatan')
                ->join('user', 'user.id', '=', 'jurnal_kesehatan.user_id')
                ->select('jurnal_kesehatan.*', 'user.nama as pengguna')
                ->orderBy('jurnal_kesehatan.id', 'desc')
                ->get();
        } else {
            $datas = Jurnal_Kesehatan::get();
        }

        return view('jurkes.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jurkes.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'entry_date' => 'required',
                'aktifitas' => 'required',
                'care_notes' => 'required',
            ],
            //custom pesan errornya
            [
                'entry_date.required' => 'Tanggal Wajib Diisi',
                'aktifitas.required' => 'Aktifitas Wajib Diisi',
                'care_notes.required' => 'Care Note Wajib Diisi',
            ]
        );

        DB::table('jurnal_kesehatan')->insert(
            [
                'entry_date' => $request->entry_date,
                'aktifitas' => $request->aktifitas,
                'care_notes' => $request->care_notes,
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect()->route('jurkes.index')
            ->with('success', 'Data Jurnal Kesehatan Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Jurnal_Kesehatan::find($id);
        return view('jurkes.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Jurnal_Kesehatan::find($id);
        return view('jurkes.form_edit', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'entry_date' => 'required',
                'aktifitas' => 'required',
                'care_notes' => 'required',
            ],
            //custom pesan errornya
            [
                'entry_date.required' => 'Tanggal Wajib Diisi',
                'aktifitas.required' => 'Aktifitas Wajib Diisi',
                'care_notes.required' => 'Care Note Wajib Diisi',
            ]
        );

        //lakukan update data dari request form edit
        DB::table('jurnal_kesehatan')->where('id', $id)->update(
            [
                'entry_date' => $request->entry_date,
                'aktifitas' => $request->aktifitas,
                'care_notes' => $request->care_notes,
                'user_id' => Auth::user()->id,
            ]
        );

        return redirect('/jurkes' . '/' . $id)
            ->with('success', 'Data Jurnal Kesehatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data di database
        Jurnal_Kesehatan::where('id', $id)->delete();
        return redirect()->route('jurkes.index')
            ->with('success', 'Data Jurnal Kesehatan Berhasil Dihapus');
    }
}
