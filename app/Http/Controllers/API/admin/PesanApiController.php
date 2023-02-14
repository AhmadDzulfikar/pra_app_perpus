<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanApiController extends Controller
{
    public function indexMasuk(){
        $pesan = Pesan::where('pengirim_id', '!=', Auth::user()->id)
        ->where('penerima_id', Auth::user()->id)
        ->get();

        return response()->json([
            'msg' => 'Pesan Masuk',
            'data' => $pesan
        ]);
    }

    public function ubah_status(Request $request){
        $pesan = Pesan::where('id', $request->id)->first();
        $pesan->update([
            'status' => 'dibaca'
        ]);
        return response()->json([
            'msg' => 'Status berhasil dirubah',
            'data' => $pesan
        ]);
    }

    //Pesan Terkirim
    public function pesanTerkirim(Request $request){
        $pesan = Pesan::where('penerima_id', '!=', Auth::user()->id)
        ->where('pengirim_id', Auth::user()->id)
        ->get();
        $penerimas = User::where('role', 'user')
        ->get();
        return response()->json([
            'msg' => 'Data pesan terkirim',
            'data' => $pesan
        ]);
    }

    public function storePesan(Request $request){
        $pesan = Pesan::create($request->all());
        $user = User::where('id', $request->penerima_id)->first();
        return response()->json([
            'msg' => 'Pesan terkirim',
            'data' => $pesan
        ]);
    }
}
