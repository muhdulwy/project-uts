<?php

use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\TestimonialController;
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

Route::get('/struktur', function () {
    return view('struktur'); //halaman index langsung ke login
});

Route::get('/tentang', function () {
    return view('tentang'); //halaman index langsung ke login
});

// Route::get('/testimonial', [TestimonialController::class, 'index']);
Route::get('/testimonial', function () {
    return view('testimonial'); //halaman index langsung ke login
});

Route::get('/berita', [BeritaController::class, 'showPublik'])->name('berita.publik');

Route::post('/login', [DashboardController::class, 'authenticate'])->name('login');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
    Route::resource('/category', CategoryController::class, ['as' => 'admin']);
    Route::resource('/anggota', AnggotaController::class, ['as' => 'admin'])->parameters([
        'anggota' => 'anggota'
    ]);
    Route::resource('/berita', BeritaController::class, ['as' => 'admin'])->parameters([
        'berita' => 'berita'
    ]);


});

// grup root untuk admin yang setiap url nya dimulai dengan admin, induk semua admin
// Route::prefix('admin')->group(function () {
//     //route untuk auth
//     Route::group(['middleware' => 'auth'], function () { //middleware mmebuat hak akses hanya untuk yang sudah admin
//         //route untuk dashboard
//         //pakai get karena tidak ada manipulasi data, name itu untuk memudahkan pemanggilan route di template html view
//         Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
//         //route untuk category
//         Route::resource('/category', CategoryController::class, ['as' => 'admin']);
//     });

// });