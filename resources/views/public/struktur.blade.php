@extends('layouts.app')
@section('content')
<h1 class="text-white text-3xl font-bold mb-8">Struktur Organisasi</h1>

<div class="grid md:grid-cols-3 gap-6">
    {{-- @foreach ($struktur as $anggota)
        <div class="bg-white rounded-lg p-4 shadow-md text-center">
            <img src="{{ asset('storage/' . $anggota->foto_anggota) }}" alt="{{ $anggota->name }}"
                class="w-24 h-24 rounded-full mx-auto mb-3 object-cover">
            <h2 class="text-lg font-semibold">{{ $anggota->name }}</h2>
            <p class="text-sm text-gray-600">{{ ucfirst($anggota->role) }}</p>
        </div>
    @endforeach --}}
</div>
@endsection
