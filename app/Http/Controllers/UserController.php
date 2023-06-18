<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('landingPage.user', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('artikel.form', compact('user'));
    }

    // public function show()
    // {
    //     $datas = User::get();
    //     $user = Auth::user();

    //     return view('admin.artikel', compact('datas', 'user'));
    // }

    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'user' => 'required|unique:user',
                'password' => 'required',
                'gender' => 'required',
                'tgl_lahir' => 'required',
                'hp' => 'required',
                'email' => 'required|unique:user',
                'alamat' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:1000',
            ],
            //custom pesan errornya
            [
                'user.required' => 'Nama User Wajib Diisi',
                'password.required' => 'Password Wajib Diisi',
                'gender.required' => 'Gender Wajib Diisi',
                'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'hp.required' => 'HP Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'email.unique' => 'Email Sudah Ada (Terduplikasi)',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 1000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file harus jpg,jpeg,png,gif,svg',
            ]
        );

        //------------apakah user  ingin upload foto--------- --
        if (!empty($request->foto)) {
            $fileName = 'user_' . $request->user . '.' . $request->foto->extension();
            $request->foto->move(public_path('/assets/imgs/user/'), $fileName);
        } else {
            $fileName = NULL;
        }
        //lakukan insert data dari request form
        DB::table('user')->insert(
            [
                'user' => $request->user,
                'password' => Hash::make($request->password),
                'gender' => $request->gender,
                'tgl_lahir' => $request->tgl_lahir,
                'hp' => $request->hp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $fileName,
                'role' => "User"
            ]
        );

        return redirect()->route('/')
            ->with('success', 'Data User Baru Berhasil Disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tampilkan data lama di form
        $data = User::find($id);
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
            if (isset($namaFileFotoLama)) unlink('/assets/imgs/artikel//' . $namaFileFotoLama);
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
            ->with('success', 'User Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = User::find($id);
        if (!empty($row->foto)) unlink('/assets/imgs/artikel/' . $row->foto);
        //hapus data di database
        User::where('id', $id)->delete();
        $user = Auth::user();
        return redirect()->route('artikel.index', ['user' => $user])
            ->with('success', 'User Berhasil Dihapus');
    }
}
