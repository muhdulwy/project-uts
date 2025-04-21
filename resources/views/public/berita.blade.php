@extends('layouts.app')
@section('content')
<h1 class="text-white text-3xl font-bold mb-8">Berita Terbaru</h1>

<div class="grid md:grid-cols-3 gap-6">
    @foreach ($beritas as $berita)
        <div class="bg-white rounded-xl shadow-md overflow-hidden">
            <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="{{ $berita->judul_berita }}" class="h-48 w-full object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg mb-2">{{ $berita->judul_berita }}</h2>
                <p class="text-sm text-gray-600 mb-4">{{ Str::limit($berita->deskripsi_berita, 1000) }}</p>
                <a href="{{ $berita->link_berita }}" target="_blank" class="text-blue-600 hover:underline text-sm">Baca Selengkapnya</a>
            </div>
        </div>
    @endforeach
</div>
@endsection
