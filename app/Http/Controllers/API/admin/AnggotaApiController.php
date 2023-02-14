<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AnggotaApiController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'user')->get();
        return response()->json([
            'data' => $data,
            'msg' => 'Berhasil Mengambil data anggota'
        ]);
    }

    public function store(Request $request)
    {
        $kode = User::where('role', 'user')->count();

        $anggota = User::create([
            'kode' => 'AA00' . $kode + 1,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'verif' => 'verified',
            'alamat' => $request->alamat,
            'role' => 'user',
            'join_date' => Carbon::now()
        ]);

        return response()->json([
            'msg' => 'berhasil menambah data',
            'data' => $anggota,
        ]);
    }

    public function update(Request $request, $id)
    {
        $anggota = User::where('role', 'user')->where('id', $id);
        $anggota->update([
            'nis' => $request->nis,
            'username' => $request->username,
            'fullname' => $request->fullname,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
        ]);

        return response()->json([
            'msg' => 'berhasil mengubah data',
            'data' => $anggota,
        ]);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Data',
            'data' => $data
        ]);
    }
}
