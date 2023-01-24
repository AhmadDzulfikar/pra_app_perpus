<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    use HasFactory;

    protected $fillable =[
        'penerima_id',
        'pengirim_id',
        'judul',
        'isi',
        'status',
        'tgl_kirim',
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function penerima(){
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }

    public function pengirim(){
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }
}
