<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class DatabukuController extends Controller
{
    public function indexBuku(){
        $kategori = Kategori::all();
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        return view('admin.katalog.buku', compact('kategori', 'buku', 'penerbit'));
    }

    public function storeBuku(Request $request){
        $buku = Buku::all();
        $buku = Buku::create($request->all());

        return redirect()->back();
    }
}
