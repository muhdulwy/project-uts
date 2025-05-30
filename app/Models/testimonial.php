<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_testimonial';

    protected $fillable = [
        'id_user', 'saran_masukan'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }
}
