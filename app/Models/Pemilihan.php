<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemilihan extends Model
{
    protected $fillable = [
        'siswa_id',
        'kandidat_id',
    ];
}
