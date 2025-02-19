<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nis',
        'kelas',
        'status_memilih',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
