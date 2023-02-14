<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PemberitahuanApiController extends Controller
{
    public function all(){
        $datas = Pemberitahuan::all();

        return response()->json([
            "message" => "Succsessfully Fetch All Data",
            "datas" => $datas
        ]);
    }
}
