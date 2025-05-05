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

Route::resource('penyewaan', penyewaanController::class);
Route::get('/penyewaan/{id}/delete', [penyewaanController::class, 'delete'])->name('penyewaan.delete');

Route::resource('petugas', petugasController::class);
Route::get('/petugas/{id}/delete', [petugasController::class, 'delete'])->name('petugas.delete');

Route::resource('sepedamotor', SepedaMotorController::class);
Route::get('/sepedamotor/{id}/delete', [SepedaMotorController::class, 'delete'])->name('SepedaMotor.delete');