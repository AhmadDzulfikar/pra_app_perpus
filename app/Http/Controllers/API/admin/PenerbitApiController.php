<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitApiController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return response()->json([
            'data' => $penerbit,
            'msg' => 'Data Kategori Buku'
        ]);
    }

    public function store(Request $request){
        $penerbit = Penerbit::all();
        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => $request->verif
        ]);
        return response()->json([
            'msg' => 'data created',
            'data' => $penerbit
        ]);
    }

    public function update(Request $request, $id)
    {
        $penerbit = Penerbit::findOrFail($id);

        $penerbit->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => $request->verif
        ]);

        return response()->json([
            'msg' => 'Berhasil Mengubah Data Penerbit',
            'data' => $penerbit
        ]);
    }

    public function destroy($id) {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Data Penerbit',
            'data' => $penerbit
        ]);
    }
}
