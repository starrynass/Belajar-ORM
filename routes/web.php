<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.create');
Route::get('/karyawan/tambah', [KaryawanController::class, 'show'])->name('karyawan.tambah');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::get('/karyawan/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');