<?php

namespace App\Http\Controllers\API\user;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanApiController extends Controller
{
    //KIRIM PESAN
    public function indexTerkirim(){
        $pesan = Pesan::where('penerima_id', '!=', Auth::user()->id )
        ->where('pengirim_id', Auth::user()->id)
        ->get();
        $penerimas = User::where('role', 'admin')
        ->get();
        return response()->json([
            'msg' => 'Data Pesan yang Terkirim ke Admin',
            'data' => $pesan
        ]);
    }

    public function storePesan(Request $request)
    {
        $pesan = Pesan::create($request->all());
        $admin = User::where('id', $request->penerima_id)->first();
        return response()->json([
            'msg' => 'Pesan Terkirim ke Admin',
            'data' => $pesan
        ]);
    }   

    //MASUK PESAN
    public function indexMasuk(Request $request)
    {
        $masuk = Pesan::where('pengirim_id', '!=', Auth::user()->id)
        ->where('penerima_id', Auth::user()->id)
        ->get();

        return response()->json([
            'msg' => 'Pesan Masuk',
            'data' => $masuk
        ]);
    }

    public function ubah_status(Request $request)
    {
        $masuk = Pesan::where('id', $request->id)->first();
        $masuk->update([
            'status' => 'dibaca'
        ]);
        return response()->json([
            'msg' => 'Status Berhasil diubah',
            'data' => $masuk
        ]);
    }
}
