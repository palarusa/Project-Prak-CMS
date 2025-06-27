<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SepedaMotorController;

Route::get('/', function () {
    return view('home');
});

Route::resource('pelanggan', PelangganController::class);
Route::get('/pelanggan/{id}/delete', [PelangganController::class, 'delete'])->name('pelanggan.delete');

Route::resource('pembayaran', PembayaranController::class);
Route::get('/pembayaran/{id}/delete', [PembayaranController::class, 'delete'])->name('pembayaran.delete');

Route::resource('penyewaan', PenyewaanController::class);
Route::get('/penyewaan/{id}/delete', [PenyewaanController::class, 'delete'])->name('penyewaan.delete');

Route::resource('petugas', PetugasController::class);
Route::get('/petugas/{id}/delete', [PetugasController::class, 'delete'])->name('petugas.delete');

Route::resource('sepedamotor', SepedaMotorController::class);
Route::get('/sepedamotor/{id}/delete', [SepedaMotorController::class, 'delete'])->name('sepedamotor.delete');