<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\LoginController as ControllersLoginController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', function () {
    return view('auth.login'); //halaman index langsung ke login
});

Route::get('/', function () {
    return view('Home'); //halaman index langsung ke login
});

use App\Http\Controllers\PublicController;

Route::get('/', [PublicController::class, 'beranda'])->name('beranda');

Route::get('/anggota', [PublicController::class, 'anggota'])->name('anggota');
Route::get('/struktur', [PublicController::class, 'struktur'])->name('struktur');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/testimonial', [PublicController::class, 'testimonial'])->name('testimonial');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');


Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('/category', CategoryController::class, ['as' => 'admin']);
    Route::resource('/anggota', AnggotaController::class, ['as' => 'admin'])->parameters([
        'anggota' => 'anggota'
    ]);
    Route::resource('/berita', BeritaController::class, ['as' => 'admin'])->parameters([
        'berita' => 'berita'
    ]);
});

Route::middleware(['auth', 'role:anggota'])->group(function () {
    // route khusus anggota
});

Route::middleware(['auth', 'role:admin,anggota'])->group(function () {
    // route admin atau anggota
});
