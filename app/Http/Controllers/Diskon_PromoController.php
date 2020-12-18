<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Diskon_PromoController extends Controller
{
    public function index()
    {
        $diskon = DB::table('diskon_promo')->select('produk.nama as Nama_Produk','diskon_promo.harga_jual','diskon_promo.bentuk_diskon', 'diskon_promo.nilai_diskon', 'diskon_promo.harga_setelah_diskon')->from('diskon_promo')->join('produk', 'diskon_promo.produk_id', 'produk.id')->where('diskon_promo.deleted', 0)->get();
        $data['diskon_promo']=$diskon;
        return json_encode($data);

    }


    public function cari($id)
    {
        $diskon_promo = DB::table('diskon_promo')->select('produk.nama as Nama_Produk','diskon_promo.harga_jual','diskon_promo.bentuk_diskon', 'diskon_promo.nilai_diskon', 'diskon_promo.harga_setelah_diskon')->from('diskon_promo')->join('produk', 'diskon_promo.produk_id', 'produk.id')->where('diskon_promo.deleted', 0)->where('diskon_promo.id', $id)->get();
        $data['diskon_promo']=$diskon_promo;
        return json_encode($data);
     }

     public function caribro($harga_jual)
     {
        $diskon_promo = DB::table('diskon_promo')->select('produk.nama as Nama_Produk','diskon_promo.harga_jual','diskon_promo.bentuk_diskon', 'diskon_promo.nilai_diskon', 'diskon_promo.harga_setelah_diskon')->from('diskon_promo')->join('produk', 'diskon_promo.produk_id', 'produk.id')->where('diskon_promo.deleted', 0)->where('diskon_promo.harga_jual','LIKE', '%'.$harga_jual.'%')->get();
        $data['diskon_promo']=$diskon_promo;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('diskon_promo')->insert($request->all());
        $berhasil = ['berhasil menambah diskon_promo'];
        return json_encode($berhasil);

     }

    public function edit( Request $request, $id)
    {
        DB::table('diskon_promo')->where('deleted', 0)->where('id', $id)->update($request->all());
        $berhasil = DB::table('diskon_promo') ->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


     public function delete($id)
     {
        DB::table('diskon_promo')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus diskon_promo dengan id : ' .$id];
        return json_encode($berhasil);
     }

     public function undelete($id)
     {
        DB::table('diskon_promo')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data diskon_promo yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
     }

}
