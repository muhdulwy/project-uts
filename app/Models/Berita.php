<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// import
use Illuminate\Database\Eloquent\Casts\Attribute;

class berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'judul',
        'deskripsi',
        'link_berita'
    ];

    // method untuk tambah fitur accessor
    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($value) => asset('/storage/beritas/' . $value),
        );
    }
}
