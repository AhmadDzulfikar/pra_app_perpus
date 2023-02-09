<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasApiController extends Controller
{
    public function index(){
        $identitas = Identitas::all();
        return response()->json([
            'data' => $identitas,
            'msg' => 'Data Kategori Buku'
        ]);
    }
}
