<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Anggota\AnggotaController as AnggotaAnggotaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
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
use App\Http\Controllers\RatingController;
use App\Http\Controllers\TestimonialController as ControllersTestimonialController;

Route::get('/', [PublicController::class, 'beranda'])->name('beranda');

Route::get('/anggota', [PublicController::class, 'anggota'])->name('anggota');
Route::get('/struktur', [PublicController::class, 'struktur'])->name('struktur');
Route::get('/berita', [PublicController::class, 'berita'])->name('berita');
Route::get('/galeri', [PublicController::class, 'galeri'])->name('galeri');
Route::get('/testimonial', [PublicController::class, 'testimonial'])->name('testimonial');
Route::get('/tentang', [PublicController::class, 'tentang'])->name('tentang');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/rating', [RatingController::class, 'store'])->name('rating.store')->middleware('auth');
Route::post('/testimonial', [ControllersTestimonialController::class, 'store'])->middleware('auth');

Route::prefix('admin')->middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('/dashboard', [LoginController::class, 'index'])->name('dashboard.admin.index');

    Route::resource('/berita', BeritaController::class, [
        'as' => 'admin', // nama route akan menjadi admin.berita.index, admin.berita.create, dll
        'parameters' => ['berita' => 'berita']
    ]);

    Route::resource('/anggota', AnggotaController::class, [
        'as' => 'admin', // menghasilkan admin.anggota.index, admin.anggota.create, dst.
        'parameters' => ['anggota' => 'anggota']
    ]);

    Route::resource('/galeri', GaleriController::class, [
        'as' => 'admin', // menghasilkan admin.galeri.index, admin.galeri.create, dst.
        'parameters' => ['galeri' => 'galeri']
    ]);

    Route::resource('/testimoni', TestimonialController::class, [
        'as' => 'admin',
        'parameters' => ['testimoni' => 'testimoni']
    ])->only(['index', 'destroy']);
});

Route::prefix('anggota')->middleware(['auth', 'role:Anggota'])->group(function () {
    // route khusus anggota
    Route::get('/dashboard', [LoginController::class, 'index'])->name('dashboard.anggota.index');
    Route::resource('/galeri', AnggotaAnggotaController::class, [
        'as' => 'anggota', // menghasilkan anggota.galeri.index, anggota.galeri.create, dst.
        'parameters' => ['galeri' => 'galeri']
    ]);

});
