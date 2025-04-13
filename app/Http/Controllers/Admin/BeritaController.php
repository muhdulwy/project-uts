<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita; //impor baris kode
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class BeritaController extends Controller
{
    //CRUDS TAMPIL
    // method untuk tampilkan data kategori
    public function index()
    {
        $beritas = Berita::latest()->when(request()->q, function ($beritas) {
            $beritas = $beritas->where("judul", "like", "%" . request()->q . "%");

        })->paginate(10);
        return view("admin.berita.index", compact("beritas"));
    }

    // BeritaController.php (atau controller yang sesuai)

    // TAMPILKAN BERITA UNTUK PUBLIK
    public function showPublik()
    {
        $beritas = Berita::latest()->get(); // Atau bisa pakai paginate kalau mau
        return view('berita', compact('beritas')); // arahkan ke view khusus untuk publik
    }


    //CRUDS INPUT
    // method untuk panggil form input data
    public function create()
    {
        return view('admin.berita.create');
    }

    //method untuk kirim data dari inputan form ke tabel kategori di database
    public function store(Request $request)
    { //method store dipanggil saat tekan tombol simpan
        // validasi inputan
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'judul' => 'required',
            'deskripsi' => 'required',
            'link_berita' => 'required',
        ]);

        //kode untuk upload gambar
        $image = $request->file('image');
        //kode untuk simpan di folder beritas
        $image->storeAs('public/beritas', $image->hashName());
        //kode untuk menyimpan data input di database
        $berita = Berita::create([
            'image' => $image->hashName(),
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link_berita' => $request->link_berita
        ]);

        // dd($image->hashName());


        //kondisi sekaligus redirect tampilkan pesan
        if ($berita) {
            return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Kategori']);
        } else {
            return redirect()->route('admin.berita.index')->with(['error' => 'Data Tidak Berhasil Disimpan Kedalam Tabel Kategori']);
        }
    }

    //CRUDS UBAH
    // method untuk tampilkan data yang mau diubah
    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    // buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Berita $berita)
    {
        $this->validate($request, [
            'judul' => 'required|unique:beritas,judul,' . $berita->id
        ]);

        if (!$request->hasFile('image')) {
            $berita->update([
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link_berita' => $request->link_berita,
            ]);
        } else {
            // Hapus gambar lama
            Storage::disk('local')->delete('public/beritas/' . basename($berita->image));

            // Upload gambar baru
            $image = $request->file('image');
            $image->storeAs('public/beritas', $image->hashName());

            $berita->update([
                'image' => $image->hashName(),
                'judul' => $request->judul,
                'deskripsi' => $request->deskripsi,
                'link_berita' => $request->link_berita,
            ]);
        }

        return redirect()->route('admin.berita.index')->with(['success' => 'Data Berhasil Diubah Kedalam Tabel Kategori']);
    }


    // method untuk menghapus data
    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        // hapus dulu gambar sebelumnya
        Storage::disk('local')->delete('public/beritas/' . basename($berita->image));
        $berita->delete();

        // kondisi berhasil atau tidak menghapus data
        if ($berita) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}