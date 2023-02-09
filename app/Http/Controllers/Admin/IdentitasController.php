<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function indexIdentitas()
    {
        $identitas = Identitas::first();
        return view('admin.identitas', compact('identitas'));
    }

    public function updateIdentitas(Request $request)
    {

        $identitas = Identitas::first();
        if ($request->foto == null) {
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_hp' => $request->alamat_hp,
            ]);
        } else {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_hp' => $request->alamat_hp,
                "foto" => "/img/" . $imageName
            ]);
        }
    return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');

    }
    // $imageName = time() . '.' . $request->foto->extension();
    
    // $request->foto->move(public_path('img'), $imageName);
    
    // $user = Identitas::find(1)->update($request->all());
    
    // if ($user) {
    //     return redirect()->back()->with("status", "success")->with(
    //         'message',
    //         'Berhasil mengubah profile');
    // }
    // $user2 = Identitas::find(1)->update([
    //     "foto" => "/img/" . $imageName
    // ]);
    // return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');
}
