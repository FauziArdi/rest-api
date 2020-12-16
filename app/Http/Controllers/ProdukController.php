<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    public function kabeh()
    {
        $produks = DB::table('produk')->where('deleted', 0)->get();
        $data['produks'] = $produks;
        return json_encode($data);
    }

    public function index()
    {
        $produks = DB::table('produk')->select('produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->get();
        $data['produks'] = $produks;
        return json_encode($data);
    }

    public function cari($id)
    {
        $produks = DB::table('produk')->select('produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->where('produk.id', $id)->get();
        $data['produks'] = $produks;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $produks = DB::table('produk')->select('produk.nama as nama', 'produk.harga_jual as harga_jual', 'kategori.nama as kategori')->from('produk')->join('kategori', 'produk.kategori_id', 'kategori.id')->where('produk.deleted', 0)->where('produk.nama', 'LIKE', '%' . $nama . '%')->get();
        $data['produks'] = $produks;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('produk')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('produk')->where('deleted', 0)->where('id', $id)->update($request->all());
        $ubah = DB::table('produk')->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengubah', $ubah);
    }

    // public function tambah($nama, $kode, $unit, $harga_dasar, $harga_jual, $keterangan, $berat, $status_olshop, $status_penjualan, $status_pembelian, $kategori_id, $total_stock)
    // {
    //     DB::table('produk')->insert(array(
    //         'nama' => $nama,
    //         'kode' => $kode,
    //         'unit' => $unit,
    //         'harga_dasar' => $harga_dasar,
    //         'harga_jual' => $harga_jual,
    //         'keterangan' => $keterangan,
    //         'berat' => $berat,
    //         'status_olshop' => $status_olshop,
    //         'status_penjualan' => $status_penjualan,
    //         'status_pembelian' => $status_pembelian,
    //         'kategori_id' => $kategori_id,
    //         'total_stock' => $total_stock
    //     ));
    //     $berhasil = ['berhasil menambah', $nama];
    //     return json_encode($berhasil);
    // }

    // public function ubah($id, $nama, $kode, $unit, $harga_dasar, $harga_jual, $keterangan, $berat, $status_olshop, $status_penjualan, $status_pembelian, $kategori_id, $total_stock)
    // {
    //     // DB::table('produk')->where('id', $id)->set(array('nama' => $nama));
    //     DB::table('produk')->where('id', $id)->update(array(
    //         'nama' => $nama,
    //         'kode' => $kode,
    //         'unit' => $unit,
    //         'harga_dasar' => $harga_dasar,
    //         'harga_jual' => $harga_jual,
    //         'keterangan' => $keterangan,
    //         'berat' => $berat,
    //         'status_olshop' => $status_olshop,
    //         'status_penjualan' => $status_penjualan,
    //         'status_pembelian' => $status_pembelian,
    //         'kategori_id' => $kategori_id,
    //         'total_stock' => $total_stock
    //     ));
    //     $berhasil = ['berhasil mengubah produk dengan id = ', $id, 'menjadi', $nama];
    //     return json_encode($berhasil);
    // }

    public function hapus($id)
    {
        DB::table('produk')->where('id', $id)->update(['deleted' => 1]);
        $berhasil = ['id = ' . $id . ' berhasil di delete'];
        return json_encode($berhasil);
    }

    public function unhapus($id)
    {
        DB::table('produk')->where('id', $id)->update(['deleted' => 0]);
        $berhasil = ['id = ' . $id . ' berhasil di restore'];
        return json_encode($berhasil);
    }
}
