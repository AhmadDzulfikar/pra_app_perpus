<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class LaporanController extends Controller
{
    public function laporan_siswa()
    {
        return view('admin.laporan.laporan');
    }

    public function cetak_siswa(Request $request)
    {
        $siswa = Peminjaman::where('user_id', $request->user_id);

        $pdf = PDF::loadview('pegawai_pdf', ['siswa' => $siswa]);
        return $pdf->download('e-perpus-laporan-siswa.pdf');
    }
}
