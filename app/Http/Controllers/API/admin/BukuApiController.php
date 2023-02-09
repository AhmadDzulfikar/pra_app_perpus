<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    public function index()
    {
        $buku = Buku::with('kategori', 'penerbit')->get();
        $data = [];

        foreach ($buku as $value) {
            $datas['judul'] = $value->judul;
            $datas['kategori'] = $value->kategori->nama;
            $datas['penerbit'] = $value->penerbit->nama;
            $datas['pengarang'] = $value->pengarang;
            $datas['tahun_terbit'] = $value->tahun_terbit;
            $datas['isbn'] = $value->isbn;
            $datas['j_buku_baik'] = $value->j_buku_baik;
            $datas['j_buku_rusak'] = $value->j_buku_rusak;
            $data[] = $datas;
        }
        return response()->json([
            $data
        ]);
    }

    // public function store(Request $request)
    // {
    //     $buku = Buku::all();
    //     $buku = Buku::create($request->all());

    //     return response()->json([
    //         'msg' => 'data created',
    //         'data' => $buku
    //     ]);
    // }
}
