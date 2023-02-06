<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $kategori = Kategori::get();
        $pemberitahuans = Pemberitahuan::where('status', 'aktif')->get();
        $bukus = Buku::all();
        return view('user.dashboard', compact("pemberitahuans", "bukus", "kategori"));
    }
}
