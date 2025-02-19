<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $fillable = [
        'waktu_memilih',
        'siswa_id',
        'kandidat_id',
    ]
}
