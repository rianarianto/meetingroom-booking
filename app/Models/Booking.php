<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'idBooking',
        'tanggalBooking',
        'waktuMulai',
        'waktuSelesai',
        'namaUser',
        'divisi',
        'ruangan',
        'keterangan',
        'status'
    ];

    protected $primaryKey = 'idBooking';

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggalBooking'])->translatedFormat('l, d F Y');
    }
    
}
