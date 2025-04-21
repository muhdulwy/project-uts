@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Berita</h1>
    <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block font-semibold mb-1">Judul</label>
            <input type="text" name="judul_berita" class="w-full border border-gray-300 rounded px-4 py-2" required>
        </div>
        <div>
            <label class="block font-semibold mb-1">Deskripsi</label>
            <textarea name="deskripsi_berita" class="w-full border border-gray-300 rounded px-4 py-2" rows="5" required></textarea>
        </div>
        <div>
            <label class="block font-semibold mb-1">Link</label>
            <input type="url" name="link_berita" class="w-full border border-gray-300 rounded px-4 py-2">
        </div>
        <div>
            <label class="block font-semibold mb-1">Foto</label>
            <input type="file" name="foto_berita" class="w-full">
        </div>
        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection