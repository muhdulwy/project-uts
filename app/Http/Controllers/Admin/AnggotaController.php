<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota; //impor baris kode
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnggotaController extends Controller
{
    //CRUDS TAMPIL
    // method untuk tampilkan data anggota
    public function index()
    {
        $anggotas = Anggota::latest()->when(request()->q, function ($anggotas) {
            $anggotas = $anggotas->where("nama_anggota", "like", "%" . request()->q . "%");
        })->paginate(10);
        return view("admin.anggota.index", compact("anggotas"));
    }

    //CRUDS INPUT
    // method untuk panggil form input data
    public function create()
    {
        return view('admin.anggota.create');
    }

    //method untuk kirim data dari inputan form ke tabel anggota di database
    public function store(Request $request)
    { //method store dipanggil saat tekan tombol simpan
        // validasi inputan
        $this->validate($request, [
            'nama_anggota' => 'required|unique:anggotas',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'jabatan' => 'required|in:Pengurus,Anggota'


        ]);

        //kode untuk upload gambar
        $image = $request->file('image');
        //kode untuk simpan di folder anggotas
        $image->storeAs('public/anggotas', $image->hashName());
        //kode untuk menyimpan data input di database

        // dd($image->hashName());

        $anggota = Anggota::create([
            'image' => $image->hashName(),
            'nama_anggota' => $request->nama_anggota,
            'jabatan' => $request->jabatan
        ]);

        //kondisi sekaligus redirect tampilkan pesan
        if ($anggota) {
            return redirect()->route('admin.anggota.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Anggota']);
        } else {
            return redirect()->route('admin.anggota.index')->with(['error' => 'Data Tidak Berhasil Disimpan Kedalam Tabel Anggota']);
        }
    }

    //CRUDS UBAH
    // method untuk tampilkan data yang mau diubah
    public function edit(Anggota $anggota)
    {
        return view('admin.anggota.edit', compact('anggota'));
    }

    // buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Anggota $anggota)
    {
        //validasi inputan karena methode yang menyimpan data ke database
        $this->validate($request, [
            'nama_anggota' => 'required|unique:anggotas,nama_anggota,' . $anggota->id,
            'jabatan' => 'required|unique:anggotas,jabatan,' . $anggota->id
        ]);

        //percabangan IF (update tanpa gambar), else (update dengan gambar)
        if ($request->file('image') == '') {
            $anggota->update([
                'nama_anggota' => $request->nama_anggota,
                'jabatan' => $request->jabatan
            ]);
        } else {
            // hapus dulu gambar sebelumnya
            Storage::disk('local')->delete('public/anggotas/' . basename($anggota->image));

            // upload file gambar yang baru
            $image = $request->file('image');
            $image->storeAs('public/anggotas', $image->hashName());

            //update data di tabel anggota dengan data baru
            $anggota = Anggota::findOrFail($anggota->id);
            $anggota->update([
                'nama_anggota' => $request->nama_anggota,
                'jabatan' => $request->jabatan,
                'image' => $image->hashName()
            ]);
        }

        //kondisi sekaligus redirect tampilkan pesan
        if ($anggota) {
            return redirect()->route('admin.anggota.index')->with(['success' => 'Data Berhasil Diubah Kedalam Tabel Anggota']);
        } else {
            return redirect()->route('admin.anggota.index')->with(['error' => 'Data Tidak Berhasil Diubah Kedalam Tabel Anggota']);
        }
    }

    // method untuk menghapus data
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        // hapus dulu gambar sebelumnya
        Storage::disk('local')->delete('public/anggotas/' . basename($anggota->image));
        $anggota->delete();

        // kondisi berhasil atau tidak menghapus data
        if ($anggota) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
