<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bonsai',
        'nama_latin_bonsai',
        'ukuran_bonsai',
        'penghargaan_bonsai',
        'foto_bonsai',
    ];
}
