<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function indexKategori()
    {
        $kategori = Kategori::all();
        return view('admin.katalog.kategori', compact('kategori'));
    }

    public function storeKategori(Request $request)
    {
        $kategori = Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);
        if ($kategori) {
            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Menambah Data Kategori");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal menambah data Kategori");
    }

    public function updateKategori(Request $request, $id){
        $kategori = Kategori::findOrFail($id);
        $kategori->update([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);
        return redirect()->back();
    }

    public function deleteKategori($id){
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back();
    }
}
