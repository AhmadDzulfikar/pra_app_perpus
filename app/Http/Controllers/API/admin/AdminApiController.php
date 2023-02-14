<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
    public function index()
    {
        $data = User::where('role', 'admin')
            ->get();
        return response()->json([
            'data' => $data,
            'msg' => 'Berhasil Mengambil data Admin'
        ]);
    }

    public function store(Request $request)
    {
        $data = User::create([
            'kode' => '',
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'verif' => 'verified',
            'join_date' => Carbon::now()
        ]);

        return response()->json([
            'data' => $data,
            'msg' => 'Berhasil Mengambil data Admin'
        ]);
    }

    public function update(Request $request, $id){
        $data = User::where('role', 'admin')->where('id', $id);
        $data->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
        ]);
        return response()->json([
            'data' => $data,
            'msg' => 'Berhasil Mengubah data Admin'
        ]);
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return response()->json([
            'msg' => 'Berhasil Menghapus Data',
            'data' => $data
        ]);
    }
}
