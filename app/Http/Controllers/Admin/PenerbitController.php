<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function indexPenerbit()
    {
        $penerbit = Penerbit::all();
        $total = count($penerbit);
        $kode = 'P00' . $total + 1;
        return view('admin.masterdata.penerbit', compact('penerbit', 'kode'));
    }

    public function storePenerbit(Request $request)
    {
        $penerbit = Penerbit::all();
        $total = count($penerbit);
        $kode = 'P00' . $total + 1;

        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            // 'verif' => 'verified'
            'verif' => $request->verif
        ]);
        if ($penerbit) {
            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Menambah Data Penerbit");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal menambah data Penerbit");
    }

    public function updatePenerbit(Request $request, $id) {
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,
        ]);
        return redirect()->back();
    }

    public function updateStatus($id, Request $request){
        $penerbit = Penerbit::where('id', $id)->first();

        if ($penerbit != null) {
            if ($request->verif == 'unverified') {
                $penerbit->update([
                    'verif' => 'verified'
                ]);
            }

            return redirect()
                ->back()
                ->with("status", "success")
                ->with("message", "Berhasil Merubah Status");
        }
        return redirect()->back()
            ->with("status", "danger")
            ->with("message", "Gagal Merubah Status");
    }

    public function deletePenerbit($id){
        $penerbit = Penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->back();
    }
}
