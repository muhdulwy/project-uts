<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_galeri';

    protected $fillable = [
        'foto_bonsai', 'nama_bonsai', 'nama_latin_bonsai', 'ukuran_bonsai', 'id_user', 'penghargaan_bonsai'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function ratings() {
        return $this->hasMany(Rating::class, 'id_galeri');
    }
}
