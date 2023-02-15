<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    //Pesan Masuk
    public function pesanMasuk(Request $request){
        $pesan = Pesan::where('pengirim_id', '!=', Auth::user()->id)
        ->where('penerima_id', Auth::user()->id)
        ->get();

        $notif = Pesan::where('id', $request->status)->first();
        if ($request->status == 'terkirim') {
            $notif->update([
                'terkirim'=> $notif->terkirim + 1
            ]);
        }
        return view('admin.pesan.masuk', compact('pesan'));
    }

    public function admin_status(Request $request){
        $request = Pesan::where('id', $request->id)->first();
        $request->update([
            'status' => 'dibaca'
        ]);
        return redirect()->route('admin.pesan_masuk');
    }

    //Pesan Terkirim
    public function pesanTerkirim(Request $request){
        $pesan = Pesan::where('penerima_id', '!=', Auth::user()->id)
        ->where('pengirim_id', Auth::user()->id)
        ->get();
        $penerimas = User::where('role', 'user')
        ->get();
        return view('admin.pesan.terkirim', compact('pesan', 'penerimas'));
    }

    public function kirimPesan(Request $request){
        $pesan = Pesan::create($request->all());
        $user = User::where('id', $request->penerima_id)->first();
        return redirect()
            ->back()
            ->with('status', 'success')
            ->with('message', "Berhasil mengirim pesan ke $user->fullname");
    }
}
