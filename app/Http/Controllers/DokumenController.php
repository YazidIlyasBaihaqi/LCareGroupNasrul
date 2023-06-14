<?php

namespace App\Http\Controllers;

use App\Models\Dokumen_Medis;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\artikeljuduljuduldeskripseideskripsiudserse\Eloquent\Model;

class DokumenController extends Controller
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
            $datas = DB::table('dokumen_medis')
                ->join('user', 'user.id', '=', 'dokumen_medis.user_id')
                ->select('dokumen_medis.*', 'user.nama as pengguna')
                ->orderBy('dokumen_medis.id', 'desc')
                ->get();
        } else {
            $id = Auth::user()->id;
            $datas = Dokumen_Medis::where('user_id', $id)->get();
        }
        $user = Auth::user();

        return view('dokumed.index', compact('datas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('dokumed.form', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'tipe_dokumen' => 'required',
                'file_upload' => 'required|min:2|max:1000',
            ],
            //custom pesan errornya
            [
                'tipe_dokumen.required' => 'Data Tipe Dokumen Wajib Diisi',
                'file_upload.required' => 'File Wajib Diupload',
                'file_upload.min' => 'Ukuran file kurang 2 KB',
                'file_upload.max' => 'Ukuran file melebihi 1000 KB',
            ]
        );
        $user = Auth::user();
        if (isset($request->file_upload)) {
            $filename = 'dokumed_' . $user->user . "_" . $request->tipe_dokumen . '.' . $request->file_upload->extension();
            $request->file_upload->move(public_path('/assets/dokumed/' . $user->user), $filename);
        } else {
            $filename = null;
        }

        DB::table('dokumen_medis')->insert(
            [
                'tipe_dokumen' => $request->tipe_dokumen,
                'file_upload' => $filename,
                'user_id' => Auth::user()->id
            ]
        );

        return redirect()->route('dokumed.index')
            ->with('success', 'Data Kesehatan Baru Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Dokumen_Medis::find($id);
        return view('dokumed.detail', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $data = Dokumen_Medis::find($id);
        return view('dokumed.form_edit', compact('data', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'tipe_dokumen' => 'required',
                'file_upload' => 'required|min:2|max:1000',
            ],
            //custom pesan errornya
            [
                'tipe_dokumen.required' => 'Data Tipe Dokumen Wajib Diisi',
                'file_upload.required' => 'File Wajib Diupload',
                'file_upload.min' => 'Ukuran file kurang 2 KB',
                'file_upload.max' => 'Ukuran file melebihi 1000 KB',
                'file_upload.pdf' => 'File bukan format pdf',
                'file_upload.mimes' => 'Extension file harus pdf',
            ]
        );
        $user = Auth::user();
        $file = DB::table('dokumen_medis')->select('file_upload')->where('id', $id)->get();
        foreach ($file as $f) {
            $namaFileLama = $f->file_upload;
        }
        //------------apakah user  ingin ubah upload file baru--------- --
        if (isset($request->file_upload)) {
            //jika ada file lama, hapus file lamanya terlebih dahulu
            if (isset($namaFileLama)) {
                unlink('assets/dokumed/' . $user->user . "/" . $namaFileLama);
                //lalukan proses ubah file lama menjadi file baru
                $fileName = 'dokumed_' . $user->user . "_" . $request->tipe_dokumen . '.' . $request->file_upload->extension();
                //$fileName = $request->file->getClientOriginalName();
                $request->file_upload->move(public_path('/assets/dokumed/' . $user->user), $fileName);
            }
        } else {
            $fileName = $namaFileLama;
        }
        //lakukan update data dari request form edit
        DB::table('dokumen_medis')->where('id', $id)->update(
            [
                'tipe_dokumen' => $request->tipe_dokumen,
                'file_upload' => $fileName,
                'user_id' => Auth::user()->id
            ]
        );

        return redirect('/dokumed')
            ->with('success', 'Data Kesehatan Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //hapus data di database
        Dokumen_Medis::where('id', $id)->delete();
        return redirect()->route('dokumed.index')
            ->with('success', 'Data Kesehatan Berhasil Dihapus');
    }
}
