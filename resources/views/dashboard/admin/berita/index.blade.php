@extends('layouts.base')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Berita</h1>
    <a href="{{ route('admin.berita.create') }}" class="bg-green-600 hover:bg-green-800 text-white px-4 py-2 rounded shadow inline-block mb-4">+ Tambah Berita</a>
    
    <table class="min-w-full bg-white rounded shadow overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-4 py-2 text-left">Judul</th>
                <th class="px-4 py-2 text-left">Deskripsi</th>
                <th class="px-4 py-2 text-left">Foto</th>
                <th class="px-4 py-2 text-left">Link</th>
                <th class="px-4 py-2 text-left">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($beritas as $berita)
            <tr class="border-t">
                <td class="px-4 py-2">{{ $berita->judul_berita }}</td>
                <td class="px-4 py-2">{{ Str::limit($berita->deskripsi_berita, 50) }}</td>
                <td class="px-4 py-2">
                    @if ($berita->foto_berita)
                        <a href="{{ asset('storage/' . $berita->foto_berita) }}" target="_blank">
                            <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="Foto Berita" class="w-16 h-16 object-cover rounded shadow">
                        </a>
                    @endif
                </td>
                <td class="px-4 py-2">
                    <a href="{{ $berita->link_berita }}" class="text-blue-500 underline" target="_blank">Lihat</a>
                </td>
                <td class="px-4 py-2 flex gap-2">
                    <a href="{{ route('admin.berita.edit', $berita->id_berita) }}" class="bg-green-600 hover:bg-green-800 text-white font-semibold px-3 py-1 inline-block mb-4 rounded">Edit</a>
                    <form action="{{ route('admin.berita.destroy', $berita->id_berita) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-800 text-white font-semibold px-3 py-1 inline-block mb-4 rounded">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection