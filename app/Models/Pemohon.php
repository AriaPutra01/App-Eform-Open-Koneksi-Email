<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemohon extends Model
{
    use HasFactory;
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'tujuan',
        'nama',
        'nik',
        'email',
        'divisi',
        'grup',
        'kebutuhan',
        'akses',
        'koneksiAplikasi',
        'mulai',
        'sampai',
        'ipSource',
        'ipDestination',
        'port',
        'initiateConnection',
        'lampiran',
        'waktuPermohonan',
    ];


    /**
     * boot
     *
     * @return void
     */

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->waktuPermohonan = now();
        });
    }
}
