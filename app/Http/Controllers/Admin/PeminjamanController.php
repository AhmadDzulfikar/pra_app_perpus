<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function indexPeminjaman(){
        $peminjaman = Peminjaman::all();
        return view('admin.masterdata.peminjaman', compact('peminjaman'));
    }
}
