<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\Penjualan\KasirController;
use App\Http\Controllers\Products\BarangController;
use App\Http\Controllers\Products\CategoryController;
use App\Http\Controllers\Products\SatuanController;
use App\Http\Controllers\Produksi\ProduksiController;
use App\Models\CategoryBarang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});

Route::post('/login', [AuthController::class, 'LoginAction'])->name('login.action');
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dasbhoard');

Route::prefix('master-barang')->group(function () {
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category-data', 'index')->name('category.index');
    });
    Route::controller(SatuanController::class)->group(function () {
        Route::get('/satuan-data', 'index')->name('satuan.index');
    });
    Route::controller(BarangController::class)->group(function () {
        Route::get('/barang-list', 'index')->name('barang.index');
    });
});

Route::prefix('produksi')->group(function () {
    Route::controller(ProduksiController::class)->group(function () {
        Route::get('/poduksi-index', 'index')->name('produksi.index');
        Route::get('/poduksi-form-baru', 'produksi_baru')->name('produksi.baru.index');
    });
});

Route::prefix('invetaris')->group(function() {
    Route::controller(InventarisController::class)->group(function() {
        Route::get('invetory-data', 'index')->name('inveotry.index');
    });
});

Route::prefix('transaksi')->group(function() {
    Route::controller(KasirController::class)->group(function() {
        Route::get('/', 'index')->name('transaksi.index');
        Route::get('/kasir', 'kasir')->name('kasir.index');
    });
});
