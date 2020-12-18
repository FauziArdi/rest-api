<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Detail_PenjualanController extends Controller
{
    public function index()
    {
        $detail = DB::table('detail_penjualan')->select('penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim','produk.nama','detail_penjualan.harga_produk','detail_penjualan.jumlah_produk')->from('detail_penjualan')->join('penjualan','detail_penjualan.penjualan_id','penjualan.id')->join('produk', 'detail_penjualan.produk_id','produk.id')->join('customer','penjualan.customer_id','customer.id')->get();
        $data['detail_penjualan']=$detail;
        return json_encode($data);

    }


    public function cari($id)
    {
        $detail = DB::table('detail_penjualan')->select('penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim','produk.nama','detail_penjualan.harga_produk','detail_penjualan.jumlah_produk')->from('detail_penjualan')->join('penjualan','detail_penjualan.penjualan_id','penjualan.id')->join('produk', 'detail_penjualan.produk_id','produk.id')->join('customer','penjualan.customer_id','customer.id')->where('detail_penjualan.id', $id)->get();
        $data['detail_penjualan']=$detail;
        return json_encode($data);
     }
     public function caribro($nama)
    {
        $detail = DB::table('detail_penjualan')->select('penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim','produk.nama as nama_produk','detail_penjualan.harga_produk','detail_penjualan.jumlah_produk')->from('detail_penjualan')->join('penjualan','detail_penjualan.penjualan_id','penjualan.id')->join('produk', 'detail_penjualan.produk_id','produk.id')->join('customer','penjualan.customer_id','customer.id')->where('produk.nama','LIKE', '%'.$nama.'%')->get();
        $data['detail_penjualan']=$detail;
        return json_encode($data);
     }


     public function create(Request $request)
     {
        DB::table('detail_penjualan')->insert($request->all());
        $berhasil = ['berhasil menambah detail_penjualan'];
        return json_encode($berhasil);

     }


    public function edit( Request $request, $id)
    {
        DB::table('detail_penjualan')->where('id', $id)->update($request->all());
        $berhasil = DB::table('detail_penjualan')->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


    //  public function delete($id)
    //  {
    //     DB::table('detail_penjualan')->where('id', $id)->update([ 'deleted'=> 1 ]);
    //     $berhasil = ['berhasil menghapus detail_penjualan dengan id : ' .$id];
    //     return json_encode($berhasil);
    //  }

    //  public function undelete($id)
    //  {
    //     DB::table('detail_penjualan')->where('id', $id)->update([ 'deleted'=> 0 ]);
    //     $berhasil = ['berhasil mengembalikan data detail_penjualan yang dihapus dengan id :' .$id];
    //     return json_encode($berhasil);
    //  }

}
