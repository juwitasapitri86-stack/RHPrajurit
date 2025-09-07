<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicFormController;
use App\Http\Controllers\AdminPrajuritController;
use Illuminate\Support\Facades\Route;

// Halaman awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (hanya untuk admin yang login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile admin
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Form untuk prajurit (bisa diakses tanpa login)
Route::get('/form/prajurit', [PublicFormController::class, 'create']);
Route::post('/form/prajurit', [PublicFormController::class, 'store'])->name('form.store');

// Admin - hanya bisa diakses setelah login + admin
Route::middleware(['auth', 'admin'])->group(function () {
    // Daftar prajurit
    Route::get('/admin/prajurit', [AdminPrajuritController::class, 'index'])->name('admin.prajurit.index');
    
    // Detail Prajurit
    Route::get('/admin/prajurit/{id}', [AdminPrajuritController::class, 'show'])->name('admin.prajurit.show');
    
    // Edit Prajurit
    Route::get('/admin/prajurit/{id}/edit', [AdminPrajuritController::class, 'edit'])->name('admin.prajurit.edit');
    Route::put('/admin/prajurit/{id}', [AdminPrajuritController::class, 'update'])->name('admin.prajurit.update');
    
    // Hapus Prajurit
    Route::delete('/admin/prajurit/{id}', [AdminPrajuritController::class, 'destroy'])->name('admin.prajurit.destroy');
    
    // Cetak PDF Prajurit
    Route::get('/admin/prajurit/{id}/pdf', [AdminPrajuritController::class, 'cetakPdf'])->name('admin.prajurit.pdf');
});

// Route auth (login, logout)
require __DIR__.'/auth.php';
