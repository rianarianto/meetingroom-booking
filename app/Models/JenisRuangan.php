<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisRuangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_jenis',
        'jenisRuangan'
    ];

    protected $primaryKey = 'id_jenis';
    public $timestamps = false;
}
