<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(10);
        return view('dashboard.admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('dashboard.admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_berita' => 'required|image',
            'judul_berita' => 'required|string',
            'deskripsi_berita' => 'required|string',
            'link_berita' => 'nullable|url',
        ]);

        $path = $request->file('foto_berita')->store('berita', 'public');

        Berita::create([
            'foto_berita' => $path,
            'judul_berita' => $request->judul_berita,
            'deskripsi_berita' => $request->deskripsi_berita,
            'link_berita' => $request->link_berita,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('dashboard.admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'foto_berita' => 'nullable|image',
            'judul_berita' => 'required|string',
            'deskripsi_berita' => 'required|string',
            'link_berita' => 'nullable|url',
        ]);

        if ($request->hasFile('foto_berita')) {
            if ($berita->foto_berita) {
                Storage::disk('public')->delete($berita->foto_berita);
            }
            $path = $request->file('foto_berita')->store('berita', 'public');
            $berita->foto_berita = $path;
        }

        $berita->update([
            'judul_berita' => $request->judul_berita,
            'deskripsi_berita' => $request->deskripsi_berita,
            'link_berita' => $request->link_berita,
        ]);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->foto_berita) {
            Storage::disk('public')->delete($berita->foto_berita);
        }
        $berita->delete();
        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
