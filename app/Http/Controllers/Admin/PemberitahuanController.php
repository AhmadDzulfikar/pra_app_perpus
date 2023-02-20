<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    public function pemberitahuan(){
        $pemberitahuan = Pemberitahuan::all();
        return view('admin.pemberitahuan', compact('pemberitahuan'));
    }

    public function tambahPemberitahuan(Request $request){
        $pemberitahuan = Pemberitahuan::create([
            'isi' => $request->isi,
            'status' => $request->status
        ]);
        if ($pemberitahuan) {
            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Menambah Data Pemberitahuan");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal menambah data Pemberitahuan");
    }

    public function updatePemberitahuan(Request $request, $id) {
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->update([
            'isi' => $request->isi,
            'status' => $request->status
        ]);
        return redirect()->back();
    }

    public function deletePemberitahuan($id){
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->delete();

        return redirect()->back();
    }
}
