<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanApiController extends Controller
{
    public function index(){
        $data = Peminjaman::all();
        return response()->json([
            "message" => "Succsessfully Fetch All Data Peminjaman",
            "datas" => $data
        ]);
    }
}
