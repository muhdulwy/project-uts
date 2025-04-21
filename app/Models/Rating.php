<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rating';

    protected $fillable = [
        'id_user', 'id_galeri', 'rating'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function galeri() {
        return $this->belongsTo(Galeri::class, 'id_galeri');
    }
}
