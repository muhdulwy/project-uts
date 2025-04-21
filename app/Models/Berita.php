<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_berita';

    protected $fillable = [
        'foto_berita', 'judul_berita', 'deskripsi_berita', 'link_berita'
    ];
}
