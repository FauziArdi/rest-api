<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PemindahanSaldoController;
use App\Http\Controllers\PenambahanSaldoController;
use App\Http\Controllers\PengaturanCashboxController;
use App\Http\Controllers\PengaturanCetakInvoiceController;
use App\Http\Controllers\PengaturanCetakStrukController;
use App\Http\Controllers\PengaturanPrinterController;
use App\Http\Controllers\PengaturanRekeningController;
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

Route::get('/PemindahanSaldo/kabeh', [PemindahanSaldoController::class, 'kabeh']);
Route::get('/PemindahanSaldo', [PemindahanSaldoController::class, 'index']);
Route::get('/PemindahanSaldo/{id}', [PemindahanSaldoController::class, 'cari']);
Route::get('/PemindahanSaldo/tanggal/{tanggal}', [PemindahanSaldoController::class, 'caritanggal']);
Route::post('/PemindahanSaldo/tambah', [PemindahanSaldoController::class, 'tambah']);
Route::put('/PemindahanSaldo/ubah/{id}', [PemindahanSaldoController::class, 'ubah']);
Route::delete('/PemindahanSaldo/hapus/{id}', [PemindahanSaldoController::class, 'hapus']);
Route::delete('/PemindahanSaldo/unhapus/{id}', [PemindahanSaldoController::class, 'unhapus']);

Route::get('/PenambahanSaldo/kabeh', [PenambahanSaldoController::class, 'kabeh']);
Route::get('/PenambahanSaldo', [PenambahanSaldoController::class, 'index']);
Route::get('/PenambahanSaldo/{id}', [PenambahanSaldoController::class, 'cari']);
Route::get('/PenambahanSaldo/tanggal/{tanggal}', [PenambahanSaldoController::class, 'caritanggal']);
Route::post('/PenambahanSaldo/tambah', [PenambahanSaldoController::class, 'tambah']);
Route::put('/PenambahanSaldo/ubah/{id}', [PenambahanSaldoController::class, 'ubah']);
// Route::delete('/PenambahanSaldo/hapus/{id}', [PenambahanSaldoController::class, 'hapus']);
// Route::delete('/PenambahanSaldo/unhapus/{id}', [PenambahanSaldoController::class, 'unhapus']);

Route::get('/PengaturanCashbox', [PengaturanCashboxController::class, 'index']);
Route::get('/PengaturanCashbox/{id}', [PengaturanCashboxController::class, 'cari']);
Route::get('/PengaturanCashbox/namaakun/{nama_akun}', [PengaturanCashboxController::class, 'carinamaakun']);
Route::post('/PengaturanCashbox/tambah', [PengaturanCashboxController::class, 'tambah']);
Route::put('/PengaturanCashbox/ubah/{id}', [PengaturanCashboxController::class, 'ubah']);
Route::delete('/PengaturanCashbox/hapus/{id}', [PengaturanCashboxController::class, 'hapus']);
Route::delete('/PengaturanCashbox/unhapus/{id}', [PengaturanCashboxController::class, 'unhapus']);

Route::get('/PengaturanCetakInvoice', [PengaturanCetakInvoiceController::class, 'index']);
Route::get('/PengaturanCetakInvoice/{id}', [PengaturanCetakInvoiceController::class, 'cari']);
// Route::get('/PengaturanCetakInvoice/panjangkarakter/{panjang_karakter}', [PengaturanCetakInvoiceController::class, 'caripanjangkarakter']);
Route::post('/PengaturanCetakInvoice/tambah', [PengaturanCetakInvoiceController::class, 'tambah']);
Route::put('/PengaturanCetakInvoice/ubah/{id}', [PengaturanCetakInvoiceController::class, 'ubah']);
// Route::delete('/PengaturanCetakInvoice/hapus/{id}', [PengaturanCetakInvoiceController::class, 'hapus']);
// Route::delete('/PengaturanCetakInvoice/unhapus/{id}', [PengaturanCetakInvoiceController::class, 'unhapus']);

Route::get('/PengaturanCetakStruk', [PengaturanCetakStrukController::class, 'index']);
Route::get('/PengaturanCetakStruk/{id}', [PengaturanCetakStrukController::class, 'cari']);
// Route::get('/PengaturanCetakStruk/panjangkarakterstruk/{panjang_karakter_struk}', [PengaturanCetakStrukController::class, 'caripanjangkarakterstruk']);
Route::post('/PengaturanCetakStruk/tambah', [PengaturanCetakStrukController::class, 'tambah']);
Route::put('/PengaturanCetakStruk/ubah/{id}', [PengaturanCetakStrukController::class, 'ubah']);
// Route::delete('/PengaturanCetakStruk/hapus/{id}', [PengaturanCetakStrukController::class, 'hapus']);
// Route::delete('/PengaturanCetakStruk/unhapus/{id}', [PengaturanCetakStrukController::class, 'unhapus']);

Route::get('/PengaturanPrinter', [PengaturanPrinterController::class, 'index']);
Route::get('/PengaturanPrinter/{id}', [PengaturanPrinterController::class, 'cari']);
Route::post('/PengaturanPrinter/tambah', [PengaturanPrinterController::class, 'tambah']);
Route::put('/PengaturanPrinter/ubah/{id}', [PengaturanPrinterController::class, 'ubah']);
// Route::delete('/PengaturanPrinter/hapus/{id}', [PengaturanPrinterController::class, 'hapus']);
// Route::delete('/PengaturanPrinter/unhapus/{id}', [PengaturanPrinterController::class, 'unhapus']);

Route::get('/PengaturanRekening', [PengaturanRekeningController::class, 'index']);
Route::get('/PengaturanRekening/{id}', [PengaturanRekeningController::class, 'cari']);
Route::get('/PengaturanRekening/namabank/{nama_bank}', [PengaturanRekeningController::class, 'carinamabank']);
Route::get('/PengaturanRekening/nomorrekening/{nomor_rekening}', [PengaturanRekeningController::class, 'carinomorrekening']);
Route::get('/PengaturanRekening/pemilikrekening/{pemilik_rekening}', [PengaturanRekeningController::class, 'caripemilikrekening']);
Route::post('/PengaturanRekening/tambah', [PengaturanRekeningController::class, 'tambah']);
Route::put('/PengaturanRekening/ubah/{id}', [PengaturanRekeningController::class, 'ubah']);
Route::delete('/PengaturanRekening/hapus/{id}', [PengaturanRekeningController::class, 'hapus']);
Route::delete('/PengaturanRekening/unhapus/{id}', [PengaturanRekeningController::class, 'unhapus']);

// Route::get('/produk/kabeh', [ProdukController::class, 'kabeh']);
// Route::delete('/produk/unhapus/{id}', [ProdukController::class, 'unhapus']);

// Route::get('/produk', [ProdukController::class, 'index']);
// Route::get('/produk/{id}', [ProdukController::class, 'cari']);
// Route::get('/produk/nama/{nama}', [ProdukController::class, 'carinama']);
// Route::post('/produk/tambah', [ProdukController::class, 'tambah']);
// Route::put('/produk/ubah/{id}', [ProdukController::class, 'ubah']);
// Route::delete('produk/hapus/{id}', [ProdukController::class, 'hapus']);
