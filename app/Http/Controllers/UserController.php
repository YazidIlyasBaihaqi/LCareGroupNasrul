<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user.index', compact('user'));
    }

    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'user' => 'required',
                'password' => 'required',
                'gender' => 'required',
                'tgl_lahir' => 'required',
                'hp' => 'required',
                'email' => 'required|unique:user',
                'alamat' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:1000',
            ],
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
            $filename = 'user_' . $request->user . '.' . $request->foto->extension();
            $request->foto->move(public_path('/assets/imgs/user/'), $filename);
        } else {
            $filename = NULL;
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
                'foto' => $filename,
                'role' => "User"
            ]
        );

        Alert::success('Success!', 'Data User Baru Berhasil Disimpan');
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tampilkan data lama di form
        $data = User::find($id);
        $user = Auth::user();
        return view('user.form_edit', compact('data', 'user'));
    }

    public function update(Request $request, string $id)
    {
        //proses input produk dari form
        $request->validate(
            [
                'user' => 'required',
                'gender' => 'required',
                'tgl_lahir' => 'required',
                'hp' => 'required',
                'email' => 'required',
                'alamat' => 'required',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:1000',
            ],
            [
                'user.required' => 'Nama User Wajib Diisi',
                'gender.required' => 'Gender Wajib Diisi',
                'tgl_lahir.required' => 'Tanggal Lahir Wajib Diisi',
                'hp.required' => 'HP Wajib Diisi',
                'email.required' => 'Email Wajib Diisi',
                'alamat.required' => 'Alamat Wajib Diisi',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 1000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file harus jpg,jpeg,png,gif,svg',
            ]
        );
        //Produk::create($request->all());
        //------------ambil foto lama apabila user ingin ganti foto-----------
        $foto = DB::table('user')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }

        if (isset($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (isset($namaFileFotoLama)) unlink('assets/imgs/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $filename = Auth::user()->user . '.' . $request->foto->extension();
            //$filename = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('assets/imgs/'), $filename);
        } else {
            $filename = $namaFileFotoLama;
        }
        //lakukan update data dari request form edit
        DB::table('user')->where('id', $id)->update(
            [
                'user' => $request->user,
                'gender' => $request->gender,
                'tgl_lahir' => $request->tgl_lahir,
                'hp' => $request->hp,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'foto' => $filename
            ]
        );

        return redirect('/user')
            ->with('success', 'Data User Baru Berhasil Diubah');
    }

    // public function destroy(string $id)
    // {
    //     //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
    //     $row = User::find($id);
    //     if (!empty($row->foto)) unlink('/assets/imgs/artikel/' . $row->foto);
    //     //hapus data di database
    //     User::where('id', $id)->delete();
    //     $user = Auth::user();
    //     return redirect()->route('artikel.index', ['user' => $user])
    //         ->with('success', 'User Berhasil Dihapus');
    // }
}
