<?php
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\Diskon_BelanjaController;
use App\Http\Controllers\Diskon_PromoController;
use App\Http\Controllers\Detail_PenjualanController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\History_StockController;


use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/customer',[CustomerController::class, 'index']);
Route::get('/customer/{id}',[CustomerController::class, 'cari']);
Route::get('/customer/cari/{nama}',[CustomerController::class, 'caribro']);
Route::post('/customer/tambah',[CustomerController::class, 'create']);
// Route::post('/Customer/tambah/{Customer}',[CustomerController::class, 'create']);
Route::put('/customer/edit/{id}',[CustomerController::class, 'edit']);
Route::delete('/customer/delete/{id}',[CustomerController::class, 'delete']);
Route::delete('/customer/undelete/{id}',[CustomerController::class, 'undelete']);

Route::get('/jasa',[JasaController::class, 'index']);
Route::get('/jasa/all',[JasaController::class, 'index_all']);
Route::get('/jasa/{id}',[JasaController::class, 'cari']);
Route::get('/jasa/cari/{nama}',[JasaController::class, 'caribro']);
Route::post('/jasa/tambah',[JasaController::class, 'create']);
Route::put('/jasa/edit/{id}',[JasaController::class, 'edit']);
Route::delete('/jasa/delete/{id}',[JasaController::class, 'delete']);
Route::delete('/jasa/undelete/{id}',[JasaController::class, 'undelete']);

Route::get('/diskon_belanja',[Diskon_BelanjaController::class, 'index']);
Route::get('/diskon_belanja/{id}',[Diskon_BelanjaController::class, 'cari']);
Route::get('/diskon_belanja/cari/{harga_jual}',[Diskon_BelanjaController::class, 'caribro']);
Route::post('/diskon_belanja/tambah',[Diskon_BelanjaController::class, 'create']);
Route::put('/diskon_belanja/edit/{id}',[Diskon_BelanjaController::class, 'edit']);
Route::delete('/diskon_belanja/delete/{id}',[Diskon_BelanjaController::class, 'delete']);
Route::delete('/diskon_belanja/undelete/{id}',[Diskon_BelanjaController::class, 'undelete']);

Route::get('/diskon_promo',[Diskon_PromoController::class, 'index']);
Route::get('/diskon_promo/{id}',[Diskon_PromoController::class, 'cari']);
Route::get('/diskon_promo/cari/{harga_jual}',[Diskon_PromoController::class, 'caribro']);
Route::post('/diskon_promo/tambah',[Diskon_PromoController::class, 'create']);
Route::put('/diskon_promo/edit/{id}',[Diskon_PromoController::class, 'edit']);
Route::delete('/diskon_promo/delete/{id}',[Diskon_PromoController::class, 'delete']);
Route::delete('/diskon_promo/undelete/{id}',[Diskon_PromoController::class, 'undelete']);

Route::get('/penjualan',[PenjualanController::class, 'index']);
Route::get('/penjualan/all',[PenjualanController::class, 'index_all']);
Route::get('/penjualan/{id}',[PenjualanController::class, 'cari']);
Route::get('/penjualan/cari/{nama}',[PenjualanController::class, 'caribro']);
Route::post('/penjualan/tambah',[PenjualanController::class, 'create']);
Route::put('/penjualan/edit/{id}',[PenjualanController::class, 'edit']);
Route::delete('/penjualan/delete/{id}',[PenjualanController::class, 'delete']);
Route::delete('/penjualan/undelete/{id}',[PenjualanController::class, 'undelete']);

Route::get('/detail-penjualan',[Detail_PenjualanController::class, 'index']);
Route::get('/detail-penjualan/all',[Detail_PenjualanController::class, 'index_all']);
Route::get('/detail-penjualan/{id}',[Detail_PenjualanController::class, 'cari']);
Route::get('/detail-penjualan/cari/{nama}',[Detail_PenjualanController::class, 'caribro']);
Route::post('/detail-penjualan/tambah',[Detail_PenjualanController::class, 'create']);
Route::put('/detail-penjualan/edit/{id}',[Detail_PenjualanController::class, 'edit']);
Route::delete('/detail-penjualan/delete/{id}',[Detail_PenjualanController::class, 'delete']);
Route::delete('/detail-penjualan/undelete/{id}',[Detail_PenjualanController::class, 'undelete']);

Route::get('/history-stock',[History_StockController::class, 'index']);
Route::get('/history-stock/all',[History_StockController::class, 'index_all']);
Route::get('/history-stock/{id}',[History_StockController::class, 'cari']);
Route::get('/history-stock/cari/{nama}',[History_StockController::class, 'caribro']);
Route::post('/history-stock/tambah',[History_StockController::class, 'create']);
Route::put('/history-stock/edit/{id}',[History_StockController::class, 'edit']);
// Route::delete('/history-stock/delete/{id}',[History_StockController::class, 'delete']);
// Route::delete('/history-stock/undelete/{id}',[History_StockController::class, 'undelete']);





































Route::get('/produk',[ProdukController::class, 'index']);
Route::get('/produk/all',[ProdukController::class, 'index_all']);
Route::get('/produk/{id}',[ProdukController::class, 'cari']);
Route::get('/produk/cari/{nama}',[ProdukController::class, 'caribro']);
// Route::get('/produk/cari/{jenis}',[ProdukController::class, 'carijenis']);

Route::post('/produk/tambah',[ProdukController::class, 'create']);
Route::put('/produk/edit/{id}',[ProdukController::class, 'edit']);
Route::delete('/produk/delete/{id}',[ProdukController::class, 'delete']);
Route::delete('/produk/undelete/{id}',[ProdukController::class, 'undelete']);

Route::get('/kategori',[KategoriController::class, 'index']);
Route::get('/kategori/{id}',[KategoriController::class, 'cari']);
Route::get('/kategori/cari/{nama}',[KategoriController::class, 'caribro']);
Route::post('/kategori/tambah',[KategoriController::class, 'create']);
// Route::post('/kategori/tambah/{kategori}',[KategoriController::class, 'create']);
Route::put('/kategori/edit/{id}',[KategoriController::class, 'edit']);
Route::delete('/kategori/hapus/{id}',[KategoriController::class, 'delete']);
