<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identitas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_app',
        'alamat_app',
        'email_app',
        'nomor_hp',
        'foto'
    ];
}
