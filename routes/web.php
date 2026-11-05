<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PesertaDidikController;

// Route::get('/', function () {
//     return view('welcome');
// });


require __DIR__ . '/auth.php';

Route::get('/', [FrontendController::class, 'index'])->name('frontend.home');

Route::get('/admin', function () {
    return view('admin.index');
});

// oriiii
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// sebelum di groupkan

// Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');
// Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.adminprofile');
// Route::get('/edit/profile', [AdminController::class, 'editprofile'])->name('edit.adminprofile');

// setelah menggunakan metode group
Route::controller(AdminController::class)->group(function () {
    Route::get('/admin/logout',  'destroy')->name('admin.logout');
    Route::get('/admin/profile',  'profile')->name('admin.adminprofile');
    Route::get('/edit/profile',  'editprofile')->name('edit.adminprofile');
    Route::post('/store/profile',  'storeprofile')->name('store.adminprofile');
});

Route::controller(AlumniController::class)->group(function () {
    // Route::get('/admin/alumni/index',  'index')->name('admin.alumni.index');
    Route::get('/admin/alumni/index',  'index')->name('admin.alumni.index');
    Route::get('/admin/alumni/edit/{alumni}',  'edit')->name('admin.alumni.edit');
    Route::patch('/admin/alumni/update/{alumni}',  'update')->name('admin.alumni.update');
    // Route::post('/admin/alumni/create',  'store')->name('alumni.create');
    Route::get('/alumni/create',  'create')->name('alumni.create');
    Route::post('/alumni/store',  'store')->name('alumni.store');
    // Route::post('/admin/alumni/create',  'store')->name('alumni.store');
    // Route::post('/alumni/destroy',  'destroy')->name('alumni.destroy');
    Route::delete('/alumni/{alumni}',  'destroy')->name('alumni.destroy');

    // Route::post('/admin/alumni/create',  'storeprofile')->name('store.alumni');
});

// Video Tutorial admin routes
Route::controller(\App\Http\Controllers\VideoTutorialController::class)->group(function () {
    Route::get('/admin/video_tutorial/index', 'index')->name('admin.video_tutorial.index');
    Route::get('/admin/video_tutorial/create', 'create')->name('admin.video_tutorial.create');
    Route::post('/admin/video_tutorial/store', 'store')->name('admin.video_tutorial.store');
    Route::get('/admin/video_tutorial/edit/{video_tutorial}', 'edit')->name('admin.video_tutorial.edit');
    Route::patch('/admin/video_tutorial/update/{video_tutorial}', 'update')->name('admin.video_tutorial.update');
    Route::post('/admin/video_tutorial/destroy', 'destroy')->name('admin.video_tutorial.destroy');
});

// Hero admin routes
Route::controller(\App\Http\Controllers\HeroController::class)->group(function () {
    Route::get('/admin/hero/index', 'index')->name('admin.hero.index');
    Route::get('/admin/hero/create', 'create')->name('admin.hero.create');
    Route::post('/admin/hero/store', 'store')->name('admin.hero.store');
    Route::get('/admin/hero/edit/{hero}', 'edit')->name('admin.hero.edit');
    Route::patch('/admin/hero/update/{hero}', 'update')->name('admin.hero.update');
    Route::delete('/admin/hero/{hero}', 'destroy')->name('admin.hero.destroy');
});

// Peserta Didik admin routes
Route::controller(PesertaDidikController::class)->group(function () {
    Route::get('/admin/pesertadidik/index', 'index')->name('admin.pesertadidik.index');
    Route::get('/pesertadidik/create', 'create')->name('pesertadidik.create');
    Route::post('/pesertadidik/store', 'store')->name('pesertadidik.store');
    Route::get('/admin/pesertadidik/edit/{peserta}', 'edit')->name('admin.pesertadidik.edit');
    Route::patch('/admin/pesertadidik/update/{peserta}', 'update')->name('admin.pesertadidik.update');
    Route::post('/pesertadidik/destroy', 'destroy')->name('pesertadidik.destroy');
});

// Frontend routes for peserta didik
Route::get('/frontend/pesertadidik', [FrontendController::class, 'pesertaDidikIndex'])->name('frontend.pesertadidik');
Route::get('/frontend/pesertadidik/{peserta}', [FrontendController::class, 'showPeserta'])->name('frontend.pesertadidik.show');

// Frontend route for video tutorial
Route::get('/frontend/video-tutorial', [FrontendController::class, 'videoTutorialIndex'])->name('frontend.video_tutorial');

// Route::middleware(['auth'])->group(function () {
// Route::middleware(['auth'])->prefix('/admin')->group(function () {
// Route::resource('/admin/alumni/index', AlumniController::class);
// Route::resource('/alumni', AlumniController::class);
// Route::resource('alumni', AlumniController::class);
// });

Route::get('/frontend/fpalumni', [FrontendController::class, 'fpalumniindex'])->name('frontend.fpalumni');
Route::get('/frontend/alumni/{alumni}', [FrontendController::class, 'showAlumniDetail'])->name('frontend.alumni.show');
Route::get('/frontend/perusahaan', [FrontendController::class, 'perusahaanIndex'])->name('frontend.perusahaan');
Route::get('/frontend/lowongan', [FrontendController::class, 'lowonganIndex'])->name('frontend.lowongan');
Route::get('/frontend/lowongan/{lowongan}', [FrontendController::class, 'showLowongan'])->name('frontend.lowongan.show');
Route::get('/frontend/service', [FrontendController::class, 'alumni_detail'])->name('frontend.alumni_detail');
Route::get('/frontend/service2', [FrontendController::class, 'alumni_detail2'])->name('frontend.alumni_detail2');
Route::get('/frontend/service3', [FrontendController::class, 'alumni_detail3'])->name('frontend.alumni_detail3');


Route::resource('/sekolah', SekolahController::class)->middleware(['auth']);

Route::resource('/perusahaan', PerusahaanController::class)->middleware(['auth']);

Route::resource('/lowongan', LowonganController::class)->middleware(['auth']);


require __DIR__ . '/auth.php';
