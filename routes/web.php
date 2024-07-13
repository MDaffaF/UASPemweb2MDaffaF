<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SlaController;
use Illuminate\Support\Facades\Route;

// Route untuk halaman login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate']);

// Route untuk halaman menu utama setelah login
Route::get('/menu', [MenuController::class, 'index'])->name('menu');

// Route untuk logout
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Route untuk CRUD SLA
Route::prefix('sla')->group(function () {
    Route::get('/create', [SlaController::class, 'create'])->name('sla.create');
    Route::post('/store', [SlaController::class, 'store'])->name('sla.store');
    Route::get('/edit/{id}', [SlaController::class, 'edit'])->name('sla.edit');
    Route::put('/update/{id}', [SlaController::class, 'update'])->name('sla.update');
    Route::delete('/sla/{id}', [SlaController::class, 'destroy'])->name('sla.destroy');


});
