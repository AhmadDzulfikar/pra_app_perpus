<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class DatabukuController extends Controller
{
    public function indexBuku()
    {
        $kategori = Kategori::all();
        $buku = Buku::all();
        $penerbit = Penerbit::all();
        return view('admin.katalog.buku', compact('kategori', 'buku', 'penerbit'));
    }

    public function storeBuku(Request $request)
    {
        // $buku = Buku::all();
        // $buku = Buku::create($request->all());

        // return redirect()->back();

        if ($request->foto != null) {

            $imageName = time() . '.' . $request->foto->extension();

            // dd($imageName);

            $request->foto->move(public_path('img'), $imageName);
            $buku  = Buku::create([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn ?? "",
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
                "foto" => "/img/" . $imageName
            ]);
        } else {
            $buku  = Buku::create([
                'judul' => $request->judul,
                'kategori_id' => $request->kategori_id,
                'penerbit_id' => $request->penerbit_id,
                'pengarang' => $request->pengarang,
                'tahun_terbit' => $request->tahun_terbit,
                'isbn' => $request->isbn ?? "",
                'j_buku_baik' => $request->j_buku_baik,
                'j_buku_rusak' => $request->j_buku_rusak,
                // "foto" => ""
            ]);
        }
        return redirect()->back();
    }

    public function updateBuku(Request $request, $id)
    {
        $buku = Buku::find($id);

        if ($buku  != null) {
            if ($request->foto != null) {

            // dd($request->foto);


                $imageName = time() . '.' . $request->foto->extension();

                $request->foto->move(public_path('img'), $imageName);

                $buku->update([
                    'judul' => $request->judul,
                    'kategori_id' => $request->kategori_id,
                    'penerbit_id' => $request->penerbit_id,
                    'pengarang' => $request->pengarang,
                    'tahun_terbit' => $request->tahun_terbit,
                    'isbn' => $request->isbn ?? "",
                    'j_buku_baik' => $request->j_buku_baik,
                    'j_buku_rusak' => $request->j_buku_rusak,
                    'foto' => "/img/" . $imageName
                ]);
            } else {
                $buku->update([
                    'judul' => $request->judul,
                    'kategori_id' => $request->kategori_id,
                    'penerbit_id' => $request->penerbit_id,
                    'pengarang' => $request->pengarang,
                    'tahun_terbit' => $request->tahun_terbit,
                    'isbn' => $request->isbn ?? "",
                    'j_buku_baik' => $request->j_buku_baik,
                    'j_buku_rusak' => $request->j_buku_rusak,
                    'foto' => $request->foto ?? ""
                ]);
            }
        }
        return redirect()->back();
    }

    public function deleteBuku($id)
    {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect()->back();
    }
}
