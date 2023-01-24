<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemberitahuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'isi',
        'level_user',
        'status'
    ];
}
