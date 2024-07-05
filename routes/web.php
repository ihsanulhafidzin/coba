<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TipeController;

// Menampilkan daftar Tipe
Route::get('/tipes', [TipeController::class, 'index'])->name('tipe.index');

// Menampilkan form untuk membuat Tipe baru
Route::get('/tipes/create', [TipeController::class, 'create'])->name('tipe.create');

// Menyimpan Tipe baru
Route::post('/tipes', [TipeController::class, 'store'])->name('tipe.store');

// Menampilkan detail Tipe
Route::get('/tipes/{tipe}', [TipeController::class, 'show'])->name('tipe.show');

// Menampilkan form untuk mengedit Tipe
Route::get('/tipes/{tipe}/edit', [TipeController::class, 'edit'])->name('tipe.edit');

// Memperbarui Tipe yang telah diedit
Route::put('/tipes/{tipe}', [TipeController::class, 'update'])->name('tipe.update');

// Menghapus Tipe
Route::delete('/tipes/{tipe}', [TipeController::class, 'destroy'])->name('tipe.destroy');



use App\Http\Controllers\HandphoneController;

Route::get('/handphones', [HandphoneController::class, 'index']);
Route::get('/handphones/create', [HandphoneController::class, 'create'])->name('handphones.create');
Route::post('/handphones', [HandphoneController::class, 'store'])->name('handphones.store');
Route::get('/handphones/{id}/edit', [HandphoneController::class, 'edit'])->name('handphones.edit');
Route::put('/handphones/{handphone}', [HandphoneController::class, 'update'])->name('handphones.update');
Route::delete('/handphones/{handphone}', [HandphoneController::class, 'destroy'])->name('handphones.destroy');
Route::resource('handphones', HandphoneController::class);
