<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/coba', function()
// {
//     echo "Hello Bro Bro";
// });
Route::get('/kategori', [KategoriController::class, 'index']);
Route::get('/kategori/{id}', [KategoriController::class, 'cari']);
Route::get('/kategori/nama/{nama}', [KategoriController::class, 'carinama']);
// Route::post('/kategori/tambah/{kategori}', [KategoriController::class, 'tambah']);
Route::post('/kategori/tambah', [KategoriController::class, 'tambah']);
// Route::put('/kategori/ubah/{id}/{nama}', [KategoriController::class, 'ubah']);
Route::put('/kategori/ubah/{id}', [KategoriController::class, 'ubah']);
Route::delete('kategori/hapus/{id}', [KategoriController::class, 'hapus']);

Route::get('/produk/kabeh', [ProdukController::class, 'kabeh']);
Route::delete('produk/unhapus/{id}', [ProdukController::class, 'unhapus']);

Route::get('/produk', [ProdukController::class, 'index']);
Route::get('/produk/{id}', [ProdukController::class, 'cari']);
Route::get('/produk/nama/{nama}', [ProdukController::class, 'carinama']);
// Route::post('/produk/tambah/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}', [ProdukController::class, 'tambah']);
// Route::put('/produk/ubah/{id}/{nama}/{kode}/{unit}/{harga_dasar}/{harga_jual}/{keterangan}/{berat}/{status_olshop}/{status_penjualan}/{status_pembelian}/{kategori_id}/{total_stock}', [ProdukController::class, 'ubah']);
Route::post('/produk/tambah', [ProdukController::class, 'tambah']);
Route::put('/produk/ubah/{id}', [ProdukController::class, 'ubah']);
Route::delete('produk/hapus/{id}', [ProdukController::class, 'hapus']);
