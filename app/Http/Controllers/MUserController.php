<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\LevelModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MUserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {
        $level = LevelModel::all();
        return view('user.create', ['level' => $level]);
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'level_id' => 'required',
            'username' => 'required',
            'username' => 'required|unique:m_user,username',
            'nama' => 'required',
        ]);

        // Buat data kategori baru berdasarkan input dari form
        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Redirect ke halaman kategori setelah berhasil menyimpan data
        return redirect('/user');
    }

    public function edit($id)
    {
        $kategori = UserModel::find($id);
        return view('kategori.edit', ['data' => $kategori]);
    }

    public function update($id, Request $request)
    {
        $kategori = UserModel::find($id);

        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();

        return redirect('/kategori');
    }

    public function delete($id)
    {
        $kategori = UserModel::find($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
