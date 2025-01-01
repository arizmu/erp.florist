<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\invetory\InventoryController;
use App\Http\Controllers\JenisProductController;
use App\Http\Controllers\management\PegawaiController;
use App\Http\Controllers\Penjualan\KasirController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Products\BarangController;
use App\Http\Controllers\Products\CategoryController;
use App\Http\Controllers\Products\SatuanController;
use App\Http\Controllers\Produksi\ProduksiController;
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
        Route::get('/category-json', 'dataJson');
        Route::post('/category-store', 'store');
        Route::get('/delete-category/{id}', 'destroy');
    });
    Route::controller(SatuanController::class)->group(function () {
        Route::get('/satuan-data', 'index')->name('satuan.index');
    });
    Route::controller(BarangController::class)->group(function () {
        Route::get('/barang-list', 'index')->name('barang.index');
        Route::post('/barang-store', 'store');
        Route::get('/barang-json', 'barangJson');
        Route::get('/barang-destroy/{getId}', 'destory');
    });
});

Route::prefix('produksi')->group(function () {
    Route::controller(ProduksiController::class)->group(function () {
        Route::get('/produksi-index', 'index')->name('produksi.index');
        Route::get('/produksi-form-baru', 'produksi_baru')->name('produksi.baru.index');
        Route::get('/get-bahan-baku', 'getBahanBaku');
        Route::get('/produksi-get-user', 'getPegawai');
        Route::post('/store-produksi', 'store');
        Route::get('/get-data-produksi', 'productionJson');
        Route::get('/to-complate/{key}', 'toComplate');
        Route::get('/distribution-to-product/{key}', 'distributionToProduct');
    });
});

Route::prefix('inventory')->group(function() {
    Route::controller(InventoryController::class)->group(function() {
        Route::get('invetory-data', 'index')->name('inventory.index');
        Route::get('invetory-form', 'formInventory')->name('inventory.form');
        Route::get('get-barang-data', 'getBarang');
        Route::post('inventory-store-data', 'storeInvetory');
        Route::get('get-inventory-data', 'IndexJsonInventory');
        Route::get('get-detail-inventory', 'detailInventory');
    });
});

Route::prefix('transaksi')->group(function() {
    Route::controller(KasirController::class)->group(function() {
        Route::get('/', 'index')->name('transaksi.index');
        Route::get('/kasir', 'kasir')->name('kasir.index');
        Route::get('/product-json', 'proudctJson');
    });
});

Route::prefix('management')->group(function() {
    Route::controller(PegawaiController::class)->group(function() {
        Route::get('pegawai', 'index')->name('pegawai.index');
        Route::post('pegawai-store', 'store');
        Route::get('pegawai-fetch-data', 'dataJson');
        Route::post('pegawai-updated', 'updated');
        Route::post('pegawai-deleted', 'destroy');
    });
    Route::controller(AppSettingController::class)->group(function() {
        Route::get('/app-setting', 'index')->name('app-setting.index');
    });
});

Route::prefix('product')->controller(ProductController::class)->group(function() {
    Route::get('/', 'index')->name('product.index');
    Route::get('/product-json', 'proudctJson');
});

Route::prefix('jenis-product')->controller(JenisProductController::class)->group(function() {
    Route::get('/', 'index')->name('jenis.product.index');
    Route::get('load-json-data', 'dataJson');
    Route::post('/store-data', 'store');
    Route::get('/delete-data/{key}', 'destroy');
});
