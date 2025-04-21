<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Testimonial;

class PublicController extends Controller
{
    public function anggota()
    {
        $users = User::whereIn('role', ['anggota'])->get();
        return view('public.anggota', compact('users'));
    }

    public function struktur()
    {
        // $struktur = User::whereIn('role', ['anggota'])->get();
        return view('public.struktur'
        // , compact('struktur')
    );
    }

    public function berita()
    {
        $beritas = Berita::latest()->get();
        return view('public.berita', compact('beritas'));
    }

    public function galeri()
    {
        $galeris = Galeri::with('user', 'ratings')->latest()->get();
        return view('public.galeri', compact('galeris'));
    }

    public function testimonial()
    {
        $testimonials = Testimonial::with('user')->latest()->get();
        return view('public.testimonial', compact('testimonials'));
    }

    public function tentang()
    {
        return view('public.tentang');
    }

    public function beranda()
    {
        return view('welcome'); // atau halaman landing utama kamu
    }
}
