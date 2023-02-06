<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function riwayatPengembalian(){
        $judul = Peminjaman::where('user_id', Auth::user()->id)
        ->where('tgl_pengembalian','!=', null)
        ->get();
        return view('user.pengembalian.riwayat', compact('judul'));
    }

    public function form_pengembalian()
    {
        $judul = Peminjaman::where('user_id', Auth::user()->id)
        ->where('tgl_pengembalian', null)
        ->get();
        return view('user.pengembalian.form', compact('judul'));
    }

    public function submit_pengembalian(Request $request)
    {
        $pengembalian = Peminjaman::where('user_id', $request->user_id)
        ->where('buku_id', $request->buku_id)
        ->where('tgl_pengembalian', null)
        ->first();

        $pengembalian->update([
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan
        ]);

        $buku = Buku::where('id', $request->buku_id)->first();

        if($request->kondisi_buku_saat_dikembalikan == 'baik') {
            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1
            ]);
        }
        if($pengembalian->kondisi_buku_saat_dipinjam == 'rusak' && $request->kondisi_buku_saat_dikembalikan =='rusak') {
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1 
            ]);
            $pengembalian->update([
                'denda' => 0
            ]);
        }
        if($pengembalian->kondisi_buku_saat_dipinjam != 'rusak' && $request->kondisi_buku_saat_dikembalikan == 'rusak') {
            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1
            ]);
            $pengembalian->update([
                'denda' => 20000
            ]);
        }
        
        if($request->kondisi_buku_saat_dikembalikan == 'hilang') {
            $pengembalian->update([
                'denda' => 50000
            ]);
        }

        // Update Pemberitahuan
        Pemberitahuan::create([
            "isi" => Auth::user()->username . " Berhasil Mengembalikan Buku " . $buku->judul,
            "status" => "pengembalian"
        ]);

        return redirect()->route('user.riwayat_pengembalian');
    }
}
