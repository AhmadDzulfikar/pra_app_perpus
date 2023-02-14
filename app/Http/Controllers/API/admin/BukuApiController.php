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
            $datas['foto'] = $value->foto;
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

    public function store(Request $request)
    {
        if ($request->foto != null) {

            $imageName = time() . '.' . $request->foto->extension();

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
        return response()->json([
            'msg' => 'Berhasil Mengembalikan buku',
            'data' => $buku
        ]);
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if ($buku  != null) {
            if ($request->foto != null) {

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
        return response()->json([
            'msg' => 'Berhasil Mengubah data buku',
            'data' => $buku
        ]);
    }

    public function destroy($id)
    {
        $buku = Buku::find($id);
        $buku->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus data buku',
            // 'data' => $buku
        ]);
    }
}
