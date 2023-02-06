<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $buku = Buku::count();

        $kategori = Kategori::count();

        $user = User::where('role', 'user')->count();

        $penerbit = Penerbit::count();

        return view('admin.dashboard', compact('buku', 'kategori', 'user', 'penerbit'));
    }
}
