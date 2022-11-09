<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminLaporanController;
use App\Http\Controllers\Admin\AdminPaketController;
use App\Http\Controllers\Admin\AdminPesananController;
use App\Http\Controllers\Api\MidtransController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('jadwal/event', [HomeController::class, 'jadwal'])->name('jadwal.event');
Route::get('detail/{id}', [HomeController::class, 'detail'])->name('detail');
Route::post('midtrans/notification', [MidtransController::class, 'handler']);

// user sudah login
Route::middleware('auth')->group(function(){
    Route::get('pesan/{id}', [PesanController::class, 'index'])->name('pesan');
    Route::post('pesan', [PesanController::class, 'simpan'])->name('pesan.simpan');
    Route::get('pesanan', [PesanController::class, 'riwayat'])->name('pesanan');
    Route::get('bayar/{id}', [PesanController::class, 'bayar'])->name('bayar');
    Route::post('bayar', [PesanController::class, 'transaksi'])->name('transaksi');
});

Auth::routes();

// admin
Route::prefix('admin')->middleware(['auth', 'level'])->group(function(){
    Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::prefix('paket')->group(function(){
        Route::get('/', [AdminPaketController::class, 'index'])->name('admin.paket');
        Route::get('/tambah', [AdminPaketController::class, 'tambah'])->name('admin.paket.tambah');
        Route::post('/simpan', [AdminPaketController::class, 'simpan'])->name('admin.paket.simpan');
        Route::get('/ubah/{id}', [AdminPaketController::class, 'ubah'])->name('admin.paket.ubah');
        Route::post('/edit', [AdminPaketController::class, 'edit'])->name('admin.paket.edit');
        Route::get('/hapus/{id}', [AdminPaketController::class, 'hapus'])->name('admin.paket.hapus');
    });
    Route::get('pesanan', [AdminPesananController::class, 'index'])->name('admin.pesanan');
    Route::get('laporan', [AdminLaporanController::class, 'index'])->name('admin.laporan');
});
