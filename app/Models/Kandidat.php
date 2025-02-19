<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
        
    protected $fillable = [
        'nama_kandidat',
        'kelas',
        'visi',
        'misi',
    ];
}
