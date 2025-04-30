<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeri = Galeri::with(['user', 'ratings'])->get();
        return view('dashboard.admin.galeri.index', compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('dashboard.admin.galeri.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'foto_bonsai' => 'required|image|mimes:jpg,jpeg,png|max:2048',
            'nama_bonsai' => 'required|string|max:255',
            'nama_latin_bonsai' => 'required|string|max:255',
            'ukuran_bonsai' => 'required|string|max:100',
            'id_user' => 'required|exists:users,id_user',
            'penghargaan_bonsai' => 'nullable|string|max:255'
        ]);

        $fotoPath = $request->file('foto_bonsai')->store('galeri', 'public');

        Galeri::create([
            'foto_bonsai' => $fotoPath,
            'nama_bonsai' => $request->nama_bonsai,
            'nama_latin_bonsai' => $request->nama_latin_bonsai,
            'ukuran_bonsai' => $request->ukuran_bonsai,
            'id_user' => $request->id_user,
            'penghargaan_bonsai' => $request->penghargaan_bonsai
        ]);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri bonsai berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        $galeri->load(['user', 'ratings']);
        $averageRating = $galeri->ratings->avg('rating') ?? 0;
        
        return view('dashboard.admin.galeri.show', compact('galeri', 'averageRating'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('dashboard.admin.galeri.edit', compact('galeri', 'anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'foto_bonsai' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'nama_bonsai' => 'required|string|max:255',
            'nama_latin_bonsai' => 'required|string|max:255',
            'ukuran_bonsai' => 'required|string|max:100',
            'id_user' => 'required|exists:users,id_user',
            'penghargaan_bonsai' => 'nullable|string|max:255'
        ]);

        $data = [
            'nama_bonsai' => $request->nama_bonsai,
            'nama_latin_bonsai' => $request->nama_latin_bonsai,
            'ukuran_bonsai' => $request->ukuran_bonsai,
            'id_user' => $request->id_user,
            'penghargaan_bonsai' => $request->penghargaan_bonsai
        ];

        if ($request->hasFile('foto_bonsai')) {
            // Delete old photo
            Storage::disk('public')->delete($galeri->foto_bonsai);
            
            // Store new photo
            $fotoPath = $request->file('foto_bonsai')->store('galeri', 'public');
            $data['foto_bonsai'] = $fotoPath;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri bonsai berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
        // Delete photo from storage
        Storage::disk('public')->delete($galeri->foto_bonsai);
        
        $galeri->delete();
        
        return redirect()->route('admin.galeri.index')->with('success', 'Data galeri bonsai berhasil dihapus!');
    }
}