<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\rekeningController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\formController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Routes Daftar Rekening
Route::get('/rekening', [rekeningController::class, 'index'])->name('rekening');
Route::get('/rekening/tambah-data', [rekeningController::class, 'tambahData']);
Route::post('/rekening/simpan-data', [rekeningController::class, 'simpanData'])->name('simpan-data-rekening');
Route::get('/rekening/{kode_rekening}/edit', [rekeningController::class, 'editData'])->name('edit-data-rekening');
Route::put('/rekening/{kode_rekening}/update', [rekeningController::class, 'updateData'])->name('update-data-rekening');
Route::delete('/rekening/hapus-data/{kode_rekening}', [rekeningController::class, 'hapusData'])->name('hapus-data-rekening');
Route::get('/rekening/search', [rekeningController::class, 'search'])->name('cari-data-rekening');

// Routes Daftar Target Anggaran
Route::get('/target', [AnggaranController::class, 'index'])->name('anggaran');
Route::get('/target/tambah-data', [AnggaranController::class, 'tambahData']);
Route::post('/target/simpan-data', [AnggaranController::class, 'simpanData'])->name('simpan-data-target');
Route::delete('/target/hapus-data/{id_anggaran}', [AnggaranController::class, 'hapusData'])->name('hapus-data-anggaran');
Route::get('/target/{id_anggaran}/edit', [AnggaranController::class, 'editData'])->name('edit-data-anggaran');
Route::put('/target/{id_anggaran}/update', [AnggaranController::class, 'updateData'])->name('update-data-anggaran');
Route::get('/target/search', [AnggaranController::class, 'search'])->name('cari-data-anggaran');

// Routes Daftar Transaksi
Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
Route::get('/transaksi/tambah-data', [TransaksiController::class, 'tambahData']);
Route::post('/transaksi/simpan-data', [TransaksiController::class, 'simpanData'])->name('simpan-data-transaksi');
Route::delete('/transaksi/hapus-data/{id_transaksi}', [TransaksiController::class, 'hapusData'])->name('hapus-data-transaksi');
Route::get('/transaksi/{id_transaksi}/edit', [TransaksiController::class, 'editData'])->name('edit-data-transaksi');
Route::put('/transaksi/{id_transaksi}/update', [TransaksiController::class, 'updateData'])->name('update-data-transaksi');
Route::get('/transaksi/search', [TransaksiController::class, 'search'])->name('cari-data-transaksi');

// Routes Laporan Pajak
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
Route::post('/laporan/generate', [LaporanController::class, 'generate'])->name('generate');
Route::get('/laporan/download', [LaporanController::class, 'generatePDF'])->name('download-laporan');

// AJAX 
Route::get('/getNama/{kode_rekening}', [formController::class, 'getNama']);
