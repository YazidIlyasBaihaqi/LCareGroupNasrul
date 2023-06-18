<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ArtikelController extends Controller
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
        $datas = DB::table('artikel')
            ->join('user', 'user.id', '=', 'artikel.user_id')
            ->select('artikel.*', 'user.user as editor')
            ->orderBy('artikel.id', 'desc')
            ->get();
        $user = Auth::user();
        return view('admin.artikel', compact('datas', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('artikel.form', compact('user'));
    }

    public function show(string $id)
    {
        $data = Artikel::find($id);
        $user = Auth::user();

        return view('artikel.detail', compact('data', 'user'));
    }

    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'judul' => 'required|unique:artikel',
                'deskripsi' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:1000',
                'user_id' => 'required',
            ],
            //custom pesan errornya
            [
                'judul.required' => 'Judul Wajib Diisi',
                'judul.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 1000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file harus jpg,jpeg,png,gif,svg',
            ]
        );

        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'artikel_' . $request->judul . '.' . $request->foto->extension();
            $request->foto->move(public_path('/assets/imgs/artikel/'), $fileName);
        } else {
            $fileName = NULL;
        }
        //lakukan insert data dari request form
        DB::table('artikel')->insert(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'user_id' => Auth::user()->id,
                'foto' => $fileName,
            ]
        );

        return redirect()->route('artikel.index')
            ->with('success', 'Data Artikel Baru Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tampilkan data lama di form
        $data = Artikel::find($id);
        return view('artikel.form_edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'judul' => 'required|unique:artikel',
                'deskripsi' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:1000',
                'user_id' => 'required',
            ],
            //custom pesan errornya
            [
                'judul.required' => 'Judul Wajib Diisi',
                'judul.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'deskripsi.required' => 'Deskripsi Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 1000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file harus jpg,jpeg,png,gif,svg',
            ]
        );
        //Produk::create($request->all());
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('artikel')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru--------- --
        if (isset($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (isset($namaFileFotoLama)) unlink('assets/imgs/artikel/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'artikel_' . $request->judul . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('/assets/imgs/artikel/'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('artikel')->where('id', $id)->update(
            [
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'user_id' => Auth::user()->id,
                'foto' => $fileName,
            ]
        );

        return redirect('/artikel' . '/' . $id)
            ->with('success', 'Artikel Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Artikel::find($id);
        if (!empty($row->foto)) unlink('assets/imgs/artikel/' . $row->foto);
        //hapus data di database
        Artikel::where('id', $id)->delete();
        $user = Auth::user();
        return redirect()->route('artikel.index', ['user' => $user])
            ->with('success', 'Artikel Berhasil Dihapus');
    }
}
