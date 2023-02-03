<?php

namespace App\Exports;

use App\Models\Peminjaman;
use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class PengembalianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Peminjaman::all();
    }
}
