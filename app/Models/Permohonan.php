<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permohonan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nama_ibu',
        'cabang',
        'jabatan',
        'no_telp',
        'alasan',
        'pendaftaran',
    ];
}
