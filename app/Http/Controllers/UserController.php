<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function store(Request $request)
    {
        //proses input produk dari form
        $request->validate(
            [
                'kode' => 'required|unique:produk|max:5',
                'nama' => 'required|max:45',
                //'harga' => 'required|double',
                'harga' => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
                'stok' => 'required|integer',
                'jenis' => 'required|integer',
                'foto' => 'nullable|max:45',
                //'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            ],
            //custom pesan errornya
            [
                'kode.required' => 'Kode Wajib Diisi',
                'kode.unique' => 'Kode Sudah Ada (Terduplikasi)',
                'kode.max' => 'Kode Maksimal 5 karakter',
                'nama.required' => 'Nama Wajib Diisi',
                'nama.max' => 'Nama Maksimal 45 karakter',
                'harga.required' => 'Harga Wajib Diisi',
                'harga.regex' => 'Harga Harus Berupa Angka',
                'stok.required' => 'Stok Wajib Diisi',
                'stok.integer' => 'Stok Harus Berupa Angka',
                'jenis_id.required' => 'Jenis Produk Wajib Diisi',
                'jenis_id.integer' => 'Jenis Produk Wajib Diisi Berupa dari Pilihan yg Tersedia',
            ]
        );
        //Produk::create($request->all());

        //lakukan insert data dari request form
        DB::table('produk')->insert(
            [
                'kode' => $request->kode,
                'nama' => $request->nama,
                'jenis_id' => $request->jenis,
                'harga' => $request->harga,
                'stok' => $request->stok,
                'foto' => $request->foto,
                //'created_at'=>now(),
            ]
        );

        return redirect()->route('produk.index')
            ->with('success', 'Data Produk Baru Berhasil Disimpan');
    }
}
