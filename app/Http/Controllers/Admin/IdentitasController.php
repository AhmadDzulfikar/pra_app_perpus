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

        if ($request->foto != null) {
            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('img'), $imageName);

            $user = Identitas::find(1)->update($request->all());

            $user2 = Identitas::find(1)->update([
                "foto" => "/img/" . $imageName
            ]);

            if ($user && $user2) {
                return redirect()->back()->with("status", "success")->with(
                    'message',
                    'Berhasil mengubah profile');
            }
            return redirect()->back()->with("status", "danger")->with('message', 'Gagal mengubah profile');
        }
    }
}
