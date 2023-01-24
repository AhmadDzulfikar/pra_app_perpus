<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use Illuminate\Http\Request;

class PesanApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesan = Pesan::get();
        return response()->json([
            'data' => $pesan,
            'msg' => 'isi Pesan'
        ], 200);
    }

    public function store(Request $request)
    {
        $pesan = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'tgl_kirim' => $request->tgl_kirim
        ]);

        return response()->json([
            'message' => 'Pesan tersampaikan',
            'data' => $pesan
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->update([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => $request->status,
            'tgl_kirim' => $request->tgl_kirim
        ]);

        return response()->json([
            'msg'=> 'pesan berhasil di edit',
        ]);
    }

    public function destroy($id)
    {
        $pesan = Pesan::findOrFail($id);

        $pesan->delete();
        return response()->json([
            'msg'=>'Pesan berhasil dihapus'
        ]);
    }
}
