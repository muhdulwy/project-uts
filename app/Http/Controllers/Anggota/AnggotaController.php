<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AnggotaController extends Controller
{
    // Menampilkan semua anggota
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('dashboard.anggota.anggota.index', compact('anggota'));
    }

    // Menampilkan form tambah anggota
    public function create()
    {
        return view('dashboard.anggota.anggota.create');
    }

    // Menyimpan data anggota baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'foto_anggota' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $foto = null;
        if ($request->hasFile('foto_anggota')) {
            $foto = $request->file('foto_anggota')->store('foto_anggota', 'public');
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'foto_anggota' => $foto,
            'role' => 'anggota'
        ]);

        return redirect()->route('anggota.anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    // Menampilkan form edit anggota
    public function edit($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        return view('dashboard.anggota.anggota.edit', compact('anggota'));
    }

    // Menyimpan perubahan data anggota
    public function update(Request $request, $id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $anggota->id_user . ',id_user',
            'foto_anggota' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        if ($request->hasFile('foto_anggota')) {
            $foto = $request->file('foto_anggota')->store('foto_anggota', 'public');
            $anggota->foto_anggota = $foto;
        }

        $anggota->name = $request->name;
        $anggota->email = $request->email;

        // Update password jika diisi
        if ($request->filled('password')) {
            $anggota->password = Hash::make($request->password);
        }

        $anggota->save();

        return redirect()->route('anggota.anggota.index')->with('success', 'Data anggota diperbarui.');
    }

    // Menghapus anggota
    public function destroy($id)
    {
        $anggota = User::where('role', 'anggota')->findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.anggota.index')->with('success', 'Anggota berhasil dihapus.');
    }
}
