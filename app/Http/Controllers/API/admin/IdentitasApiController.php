<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IdentitasApiController extends Controller
{
    public function index(){
        $identitas = Identitas::all();
        return response()->json([
            'data' => $identitas,
            'msg' => 'Data Kategori Identitas'
        ]);
    }

    public function update(Request $request)
    {
        $identitas = Identitas::first();

        if ($request->foto == null) {
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
            ]);
        } else {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img'), $imageName);
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
                "foto" => "/img/" . $imageName
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil Mengembalikan buku',
            'data' => $identitas
        ]);
    }
}
