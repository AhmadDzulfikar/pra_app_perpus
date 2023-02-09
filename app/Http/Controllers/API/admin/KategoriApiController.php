<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriApiController extends Controller
{
    public function index(){
        $kategori = Kategori::all();
        return response()->json([
            'data' => $kategori,
            'msg' => 'Data Kategori Buku'
        ]);
    }

    public function store(Request $request){
        $kategori = Kategori::all();
        $kategori = Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);
        return response()->json([
            'msg' => 'data created',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return response()->json([
            'msg' => 'Berhasil Mengubah Data Kategori',
            'data' => $kategori
        ]);
    }

    public function destroy($id) {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Delete',
            'data' => $kategori
        ]);
    }
}
