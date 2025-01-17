<?php

use App\Http\Controllers\AppSettingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\invetory\InventoryController;
use App\Http\Controllers\JenisProductController;
use App\Http\Controllers\management\PegawaiController;
use App\Http\Controllers\Penjualan\KasirController;
use App\Http\Controllers\PreoderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Products\BarangController;
use App\Http\Controllers\Products\CategoryController;
use App\Http\Controllers\Products\SatuanController;
use App\Http\Controllers\Produksi\ProduksiController;
use App\Http\Controllers\RJasaCraftingController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'LoginAction'])->name('login.action');

Route::group(['middleware' => 'auth.manuals'], function () {
    Route::get('/logout', [AuthController::class, 'LogoutAction'])->name('logout');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dasbhoard');

    Route::prefix('master-barang')->group(function () {
        Route::controller(CategoryController::class)->group(function () {
            Route::get('/category-data', 'index')->name('category.index');
            Route::get('/category-json', 'dataJson');
            Route::post('/category-store', 'store');
            Route::get('/delete-category/{id}', 'destroy');
            Route::post('/category-updated/{id}', 'updated');
        });
        Route::controller(SatuanController::class)->group(function () {
            Route::get('/satuan-data', 'index')->name('satuan.index');
            Route::get('/satuan-get-json', 'dataJson');
            Route::post('/satuan-store', 'store');
            Route::post('/satuan-update/{key}', 'update');
            Route::post('/satuan-delete/{key}', 'hapus');
        });
        Route::controller(BarangController::class)->group(function () {
            Route::get('/barang-list', 'index')->name('barang.index');
            Route::post('/barang-store', 'store');
            Route::get('/barang-json', 'barangJson');
            Route::get('/barang-destroy/{getId}', 'destory');
            Route::get('/barang-get-satuan', 'getSatuan');
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

    Route::prefix('inventory')->group(function () {
        Route::controller(InventoryController::class)->group(function () {
            Route::get('invetory-data', 'index')->name('inventory.index');
            Route::get('invetory-form', 'formInventory')->name('inventory.form');
            Route::get('get-barang-data', 'getBarang');
            Route::post('inventory-store-data', 'storeInvetory');
            Route::get('get-inventory-data', 'IndexJsonInventory');
            Route::get('get-detail-inventory', 'detailInventory');
        });
    });

    Route::prefix('transaksi')->group(function () {
        Route::controller(KasirController::class)->group(function () {
            Route::get('/', 'index')->name('transaksi.index');
            Route::get('/kasir', 'kasir')->name('kasir.index');
            Route::get('/product-json', 'proudctJson');
            Route::post('/on-proses', 'prosesTransaksi');
            Route::get('/kasir-proses-bayar/{transaksiKey}', 'prosesBayar')->name('kasir.proses.bayar');
            Route::get('/kasir-transaksi-detail/{transaksiKey}', 'transaksiDetail')->name('kasir.transaksi.detail');
            Route::post('kasir-proses-bayar-post/{key}', 'prosesBayarPost');
            Route::get('/cetak-invoice/{transaksi_id}/{invoice_id}', 'invoice');
        });
        Route::controller(PreoderController::class)->group(function() {
            Route::get('/pre-order-form', 'formLayout')->name('preoder.form.layout');
            Route::get('/get-material', 'getMaterial');
            Route::get('/get-crafter', 'getCrafter');
            Route::get('/get-referensi-jasa', 'getReferensiJasa');
            Route::post('/pre-order-action', 'preOrderStore');
        });
    });

    Route::prefix('management')->group(function () {
        Route::controller(PegawaiController::class)->group(function () {
            Route::get('pegawai', 'index')->name('pegawai.index');
            Route::post('pegawai-store', 'store');
            Route::get('pegawai-fetch-data', 'dataJson');
            Route::post('pegawai-updated', 'updated');
            Route::post('pegawai-deleted', 'destroy');
        });
        Route::controller(AppSettingController::class)->group(function () {
            Route::get('/app-setting', 'index')->name('app-setting.index');
            Route::get('/app-set-get', 'appFirst');
            Route::post('/app-set-store', 'storeOrUpdate');
        });
        Route::controller(UserController::class)->group(function () {
            Route::get('/user-index', 'index')->name('user.index');
            Route::get('/user-json', 'userJson');
            Route::post('/user-store', 'store');
            Route::get('/user-delete/{id}', 'destroy');
            Route::post('/user-update', 'update');
            Route::get('/user-password/{id}', 'passwordUpdate');
            Route::get('/user-get-pegawai', 'getPegawai');
        });
    });
    Route::prefix('product')->controller(ProductController::class)->group(function () {
        Route::get('/', 'index')->name('product.index');
        Route::get('/product-json', 'proudctJson');
        Route::post('/update-product-data/{key}', 'update');
    });

    Route::prefix('jenis-product')->controller(JenisProductController::class)->group(function () {
        Route::get('/', 'index')->name('jenis.product.index');
        Route::get('load-json-data', 'dataJson');
        Route::post('/store-data', 'store');
        Route::get('/delete-data/{key}', 'destroy');
    });

    Route::group([
        'controller' => RJasaCraftingController::class,
        'prefix' => 'ref-jasa'
    ], function () {
        Route::get('/', 'index')->name('ref-jasa.index');
        Route::post('/store-data', 'store');
        Route::post('/update-data/{key}', 'update');
        Route::post('/delete-data/{key}', 'delete');
        Route::get('/get-data-json', 'getJson');
    });
});
