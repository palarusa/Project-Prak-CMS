<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\SepedaMotorController;
use App\Http\Controllers\LoginController;

// Semua route CRUD dilindungi auth
Route::middleware('auth')->group(function () {
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

    // Halaman home setelah login
    Route::get('/home', function () {
        return view('home', [
            'totalPetugas'      => \App\Models\Petugas::count(),
            'totalPelanggan'    => \App\Models\Pelanggan::count(),
            'totalPenyewaan'    => \App\Models\Penyewaan::count(),
            'totalPembayaran'   => \App\Models\Pembayaran::count(),
            'totalSepedaMotor'  => \App\Models\SepedaMotor::count(),
        ]);
    })->middleware('auth');
});

// Route login/logout (tidak pakai middleware auth)
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Redirect root "/" ke /home
Route::get('/', function () {
    return redirect('/login');
});
