<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    //CRUDS TAMPIL
    // method untuk tampilkan data anggota
    public function index()
    {

        $testimonial = testimonial::latest()->when(request()->q, function ($testimonial) {
            $testimonial = $testimonial->where("username", "like", "%" . request()->q . "%");
        })->paginate(10);
        return view("testimonial", compact("testimonial$testimonial"));
    }

    //CRUDS INPUT
    // method untuk panggil form input data
    public function create()
    {
        return view('admin.testimonial.create');
    }

    //method untuk kirim data dari inputan form ke tabel anggota di database
    public function store(Request $request)
    { //method store dipanggil saat tekan tombol simpan
        // validasi inputan
        $this->validate($request, [
            'username' => 'required|unique:usernames',
            'saran_masukan' => 'required,'
        ]);

        //kode untuk upload gambar
        //$image = $request->file('image');
        //kode untuk simpan di folder anggotas
        //$image->storeAs('public/anggotas', $image->hashName());
        //kode untuk menyimpan data input di database

        // dd($image->hashName());

        $testimonial = testimonial::create([
            'username' => $request->username,
            'saran_masukan' => $request->saran_masukan
        ]);

        //kondisi sekaligus redirect tampilkan pesan
        if ($testimonial) {
            return redirect()->route('admin.testimonial.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Testimonial']);
        } else {
            return redirect()->route('admin.testimonial.index')->with(['error' => 'Data Tidak Berhasil Disimpan Kedalam Tabel Testimonial']);
        }
    }

    //CRUDS UBAH
    // method untuk tampilkan data yang mau diubah
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    // buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Testimonial $testimonial)
    {
        //validasi inputan karena methode yang menyimpan data ke database
        $this->validate($request, [
            'username' => 'required|unique:testimonials,username,' . $testimonial->id,
            'saran_masukan' => 'required|unique:testimonials,saran_masukan,' . $testimonial->id
        ]);

        //percabangan IF (update tanpa gambar), else (update dengan gambar)
        if ($request->file('image') == '') {
            $testimonial->update([
                'username' => $request->username,
                'saran_masukan' => $request->saran_masukan
            ]);
        } else {
            // hapus dulu gambar sebelumnya
            Storage::disk('local')->delete('public/testimonials/' . basename($testimonial->image));

            // upload file gambar yang baru
            $image = $request->file('image');
            $image->storeAs('public/testimonials', $image->hashName());

            //update data di tabel anggota dengan data baru
            $testimonial = Testimonial::findOrFail($testimonial->id);
            $testimonial->update([
                'username' => $request->username,
                'saran_masukan' => $request->saran_masukan,
            ]);
        }

        //kondisi sekaligus redirect tampilkan pesan
        if ($testimonial) {
            return redirect()->route('admin.testimonial.index')->with(['success' => 'Data Berhasil Diubah Kedalam Tabel Testimonial']);
        } else {
            return redirect()->route('admin.testimonial.index')->with(['error' => 'Data Tidak Berhasil Diubah Kedalam Tabel Testimonial']);
        }
    }

    // method untuk menghapus data
    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        // hapus dulu gambar sebelumnya
        Storage::disk('local')->delete('public/testimonials/' . basename($testimonial->image));
        $testimonial->delete();

        // kondisi berhasil atau tidak menghapus data
        if ($testimonial) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}
