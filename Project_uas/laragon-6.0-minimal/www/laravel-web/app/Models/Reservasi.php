<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'laboratorium',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'keperluan',
        'jumlah_peserta',
        'catatan',
        'status',
    ];
}
