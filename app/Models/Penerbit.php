<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
        'verif'
    ];

    public function bukus(){
        return $this->hasMany(Kategori::class);
    }
}
