<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| PUBLIK - Tidak perlu login
| Pengunjung bisa melihat halaman, produk, detail, dan kontak WhatsApp
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

// Daftar produk & detail produk = PUBLIK
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/detail/{produk}', [ProdukController::class, 'show'])->name('produk.show');

/*
|--------------------------------------------------------------------------
| USER, ADMIN, SUPERADMIN - Harus login
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| ADMIN - Harus login, role: admin
| Penjual mengelola produk mereka sendiri
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    // CRUD Produk Admin
    Route::get('/produk', [ProdukController::class, 'adminIndex'])->name('produk.index');
    Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{produk}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');
});

/*
|--------------------------------------------------------------------------
| SUPER ADMIN - Harus login, role: superadmin
| Kelola seluruh sistem
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'dashboard'])->name('dashboard');

    // Produk (Superadmin hanya melihat semua produk dan hapus)
    Route::get('/produk', [ProdukController::class, 'superadminIndex'])->name('produk.index');
    Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // CRUD Kategori
    Route::resource('kategori', KategoriController::class)->except(['show']);

    // CRUD Admin
    Route::resource('admin', UserController::class)->except(['show']);
});

require __DIR__.'/auth.php';
