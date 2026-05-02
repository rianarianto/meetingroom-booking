<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruangan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'idRuangan',
        'namaRuangan',
        'jenisRuangan',
        'kapasitasRuangan',
        'lokasiRuangan',
        'gambar',
        'keterangan'
    ];

    
    protected $primaryKey = 'idRuangan';
    
}
