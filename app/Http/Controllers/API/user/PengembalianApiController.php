<?php

namespace App\Http\Controllers\API\user;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PengembalianApiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('user', 'buku')->get();
        $data = [];

        foreach ($peminjaman as $value) {
            $datas['user'] = $value->user->username;
            $datas['buku'] = $value->buku->judul;
            $datas['tgl_peminjaman'] = $value->tgl_peminjaman;
            $datas['tgl_pengembalian'] = $value->tgl_pengembalian;
            $datas['kondisi_buku_saat_dipinjam'] = $value->kondisi_buku_saat_dipinjam;
            $datas['kondisi_buku_saat_dikembalikan'] = $value->kondisi_buku_saat_dikembalikan;
            $datas['denda'] = $value->denda;
            $data[] = $datas;
        }
        return response()->json([
            $data
        ]);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'user_id' => $request->user_id,
            'buku_id' => $request->buku_id,
            'tgl_pengembalian' => Carbon::now()->format('Y-m-d'),
            'kondisi_buku_saat_dipinjam' => $request->kondisi_buku_saat_dipinjam,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan,
            'denda' => $request->denda,
        ]);

        return response()->json([
            'msg' => 'Berhasil Mengembalikan buku',
            'data' => $peminjaman
        ]);
    }
}
