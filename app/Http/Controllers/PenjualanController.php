<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = DB::table('penjualan')->select('penjualan.id','penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim')->from('penjualan')->join('customer', 'penjualan.customer_id', 'customer.id')->where('penjualan.deleted', 0)->get();
        $data['penjualan']=$penjualan;
        return json_encode($data);

    }

    public function index_all()
    {
        $penjualan = DB::table('penjualan')->select('penjualan.nama as nama_penjualan','customer.nama as customer','penjualan.kode','penjualan.harga_dasar as harga_dasar', 'penjualan.harga_jual', 'penjualan.keterangan','penjualan.keterangan','penjualan.berat','penjualan.total_stock')->from('penjualan')->join('customer', 'penjualan.customer_id', 'customer.id')->where('penjualan.deleted', 0)->get();
        $data['penjualan']=$penjualan;
        return json_encode($data);

    }

    public function cari($id)
    {
        $penjualan = DB::table('penjualan')->select('penjualan.id','penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim')->from('penjualan')->join('customer', 'penjualan.customer_id', 'customer.id')->where('penjualan.deleted', 0)->where('penjualan.id', $id)->get();
        $data['penjualan']=$penjualan;
        return json_encode($data);
     }

     public function caribro($nomor_urut)
     {
        $penjualan = DB::table('penjualan')->select('penjualan.id','penjualan.tanggal','penjualan.nomor_urut','penjualan.kode','penjualan.grand_total','customer.nama_lengkap','penjualan.keterangan','penjualan.alamat_pengiriman','penjualan.total','penjualan.pajak','penjualan.diskon','penjualan.jenis_diskon','penjualan.biaya_kirim')->from('penjualan')->join('customer', 'penjualan.customer_id', 'customer.id')->where('penjualan.deleted', 0)->where('penjualan.nama','LIKE', '%'.$nomor_urut.'%')->get();
        $data['penjualan']=$penjualan;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('penjualan')->insert($request->all());
        $berhasil = ['berhasil menambah penjualan'];
        return json_encode($berhasil);
     }

    public function edit( Request $request, $id)
    {
        DB::table('penjualan')->where('deleted', 0)->where('id', $id)->update($request->all());
        $berhasil = DB::table('penjualan') ->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


     public function delete($id)
     {
        DB::table('penjualan')->where('id', $id)->update([ 'deleted'=>1 ]);
        $berhasil = ['berhasil menghapus penjualan dengan id : ' .$id];
        return json_encode($berhasil);
     }

     public function undelete($id)
     {
        DB::table('penjualan')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data penjualan yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
     }

}
