<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category; //impor baris kode
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class CategoryController extends Controller
{
    //CRUDS TAMPIL
    // method untuk tampilkan data kategori
    public function index()
    {
        $categories = Category::latest()->when(request()->q, function ($categories) {
            $categories = $categories->where("nama_kategori", "like", "%" . request()->q . "%");

        })->paginate(10);
        return view("admin.category.index", compact("categories"));
    }

    //CRUDS INPUT
    // method untuk panggil form input data
    public function create()
    {
        return view('admin.category.create');
    }

    //method untuk kirim data dari inputan form ke tabel kategori di database
    public function store(Request $request)
    { //method store dipanggil saat tekan tombol simpan
        // validasi inputan
        $this->validate($request, [
            'nama_kategori' => 'required|unique:categories',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2000'
        ]);

        //kode untuk upload gambar
        $image = $request->file('image');
        //kode untuk simpan di folder categories
        $image->storeAs('public/categories', $image->hashName());
        //kode untuk menyimpan data input di database
        $category = Category::create([
            'image' => $image->hashName(),
            'nama_kategori' => $request->nama_kategori
        ]);

        //kondisi sekaligus redirect tampilkan pesan
        if ($category) {
            return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Disimpan Kedalam Tabel Kategori']);
        } else {
            return redirect()->route('admin.category.index')->with(['error' => 'Data Tidak Berhasil Disimpan Kedalam Tabel Kategori']);
        }
    }

    //CRUDS UBAH
    // method untuk tampilkan data yang mau diubah
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    // buat method untuk kirimkan data yang diubah di form inputan
    public function update(Request $request, Category $category)
    {
        //validasi inputan karena methode yang menyimpan data ke database
        $this->validate($request, [
            'nama_kategori' => 'required|unique:categories,nama_kategori,' . $category->id
        ]);

        //percabangan IF (update tampa gambar), else (update w gambar)
        if ($request->file('image') == '') {
            $category->update([
                'nama_kategori' => $request->nama_kategori
            ]);
        } else {
            // hapus dulu gambar sebelumnya
            Storage::disk('local')->delete('public/categories/' . basename($category->image));

            // upload file gambar yang baru
            $image = $request->file('image');

            //kode untuk simpan di folder categories
            $image->storeAs('public/categories', $image->hashName());

            //update data di tabel kategori dengan tabel baru
            $category = Category::findOrFail($category->id);
            $category->update([
                'nama_kategori' => $request->nama_kategori,
                'image' => $image->hashName()
            ]);

        }
        //kondisi sekaligus redirect tampilkan pesan
        if ($category) {
            return redirect()->route('admin.category.index')->with(['success' => 'Data Berhasil Diubah Kedalam Tabel Kategori']);
        } else {
            return redirect()->route('admin.category.index')->with(['error' => 'Data Tidak Berhasil Diubah Kedalam Tabel Kategori']);
        }
    }
    // method untuk menghapus data
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        // hapus dulu gambar sebelumnya
        Storage::disk('local')->delete('public/categories/' . basename($category->image));
        $category->delete();

        // kondisi berhasil atau tidak menghapus data
        if ($category) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'error']);
        }
    }
}