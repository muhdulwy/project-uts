@extends('layouts.app')
@section('content')
<h1 class="text-white text-3xl font-bold mb-8">Galeri Bonsai</h1>

<div class="grid md:grid-cols-3 gap-6">
    @foreach ($galeris as $galeri)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <img src="{{ asset('storage/' . $galeri->foto_bonsai) }}" alt="{{ $galeri->nama_bonsai }}" class="w-full h-56 object-cover">
            <div class="p-4">
                <h2 class="text-xl font-bold">{{ $galeri->nama_bonsai }}</h2>
                <p class="text-sm text-gray-600 italic mb-1">({{ $galeri->nama_latin_bonsai }})</p>
                <p class="text-sm text-gray-600">Ukuran: {{ $galeri->ukuran_bonsai }}</p>
                <p class="text-sm text-gray-600 mb-2">Pemilik: {{ $galeri->user->name }}</p>
                @if ($galeri->penghargaan_bonsai)
                    <span class="inline-block bg-yellow-300 text-black text-xs px-2 py-1 rounded">🏆 {{ $galeri->penghargaan_bonsai }}</span>
                @endif
                <div class="mt-2 text-sm text-yellow-500">
                    ⭐ {{ number_format($galeri->ratings->avg('rating'), 1) }} / 5 dari {{ $galeri->ratings->count() }} rating
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
