<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class History_StockController extends Controller
{
    public function index()
    {
        $history = DB::table('history_stock')->select('produk.nama as Nama_Produk','history_stock.stock_produk','history_stock.keterangan','history_stock.tanggal','history_stock.ref_id', 'history_stock.tipe')->from('history_stock')->join('produk', 'history_stock.produk_id', 'produk.id') ->get();
        $data['history_stock']=$history;
        return json_encode($data);

    }


    public function cari($id)
    {
        $history= DB::table('history_stock')->select('produk.nama as Nama_Produk','history_stock.stock_produk','history_stock.keterangan','history_stock.tanggal', 'history_stock.ref_id', 'history_stock.tipe')->from('history_stock')->join('produk', 'history_stock.produk_id', 'produk.id') ->where('history_stock.id', $id)->get();
        $data['history_stock']=$history;
        return json_encode($data);
     }

     public function caribro($nama)
     {
        $history = DB::table('history_stock')->select('produk.nama as Nama_Produk','history_stock.stock_produk','history_stock.keterangan','history_stock.tanggal','history_stock.ref_id', 'history_stock.tipe')->from('history_stock')->join('produk', 'history_stock.produk_id', 'produk.id') ->where('produk.nama','LIKE', '%'.$nama.'%')->get();
        $data['history_stock']=$history;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('history_stock')->insert($request->all());
        $berhasil = ['berhasil menambah history_stock'];
        return json_encode($berhasil);

     }

    public function edit( Request $request, $id)
    {
        DB::table('history_stock')->where('id', $id)->update($request->all());
        $berhasil = DB::table('history_stock') ->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


    //  public function delete($id)
    //  {
    //     DB::table('history_stock')->where('id', $id)->update([ 'deleted'=> 1 ]);
    //     $berhasil = ['berhasil menghapus history_stock dengan id : ' .$id];
    //     return json_encode($berhasil);
    //  }

    //  public function undelete($id)
    //  {
    //     DB::table('history_stock')->where('id', $id)->update([ 'deleted'=> 0 ]);
    //     $berhasil = ['berhasil mengembalikan data history_stock yang dihapus dengan id :' .$id];
    //     return json_encode($berhasil);
    //  }

}
