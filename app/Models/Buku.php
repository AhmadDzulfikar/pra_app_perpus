<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'kategori_id',
        'penerbit_id',
        'pengarang',
        'tahun_terbit',          
        'isbn',                     
        'j_buku_baik',
        'j_buku_rusak',
        'foto'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class);
    }

    
}
