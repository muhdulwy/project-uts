@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6 max-h-screen overflow-y-auto pb-10">
    <h1 class="text-2xl font-bold mb-4">Edit Berita</h1>
    <form action="{{ route('admin.berita.update', $berita->id_berita) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul_berita" value="{{ $berita->judul_berita }}" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi_berita" class="w-full border border-gray-300 rounded px-4 py-2" rows="5" required>{{ $berita->deskripsi_berita }}</textarea>
        </div>
        <div>
            <label class="block font-semibold mb-1">Link</label>
            <input type="url" name="link_berita" value="{{ $berita->link_berita }}" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Foto</label>
            <input type="file" name="foto_berita" class="w-full">
            @if ($berita->foto_berita)
                <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="Foto Berita" class="mt-2 max-w-full rounded shadow">
            @endif
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-700 text-white font-semibold px-5 py-2 rounded shadow">Update</button>
    </form>
</div>
@endsection