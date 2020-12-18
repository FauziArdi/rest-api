<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class Diskon_BelanjaController extends Controller
{
    public function index()
    {
        $diskon = DB::table('diskon_belanja')->select('produk.nama as Nama_Produk','diskon_belanja.harga_jual','diskon_belanja.jika_jumlah','diskon_belanja.bentuk_diskon', 'diskon_belanja.nilai_diskon', 'diskon_belanja.harga_setelah_diskon')->from('diskon_belanja')->join('produk', 'diskon_belanja.produk_id', 'produk.id')->where('diskon_belanja.deleted', 0)->get();
        $data['diskon_belanja']=$diskon;
        return json_encode($data);

    }


    public function cari($id)
    {
        $diskon_belanja = DB::table('diskon_belanja')->select('produk.nama as Nama_Produk','diskon_belanja.harga_jual','diskon_belanja.jika_jumlah','diskon_belanja.bentuk_diskon', 'diskon_belanja.nilai_diskon', 'diskon_belanja.harga_setelah_diskon')->from('diskon_belanja')->join('produk', 'diskon_belanja.produk_id', 'produk.id')->where('diskon_belanja.deleted', 0)->where('diskon_belanja.id', $id)->get();
        $data['diskon_belanja']=$diskon_belanja;
        return json_encode($data);
     }

     public function caribro($harga_jual)
     {
        $diskon_belanja = DB::table('diskon_belanja')->select('produk.nama as Nama_Produk','diskon_belanja.harga_jual','diskon_belanja.jika_jumlah','diskon_belanja.bentuk_diskon', 'diskon_belanja.nilai_diskon', 'diskon_belanja.harga_setelah_diskon')->from('diskon_belanja')->join('produk', 'diskon_belanja.produk_id', 'produk.id')->where('diskon_belanja.deleted', 0)->where('diskon_belanja.harga_jual','LIKE', '%'.$harga_jual.'%')->get();
        $data['diskon_belanja']=$diskon_belanja;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('diskon_belanja')->insert($request->all());
        $berhasil = ['berhasil menambah diskon_belanja'];
        return json_encode($berhasil);

     }

    public function edit( Request $request, $id)
    {
        DB::table('diskon_belanja')->where('deleted', 0)->where('id', $id)->update($request->all());
        $berhasil = DB::table('diskon_belanja') ->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


     public function delete($id)
     {
        DB::table('diskon_belanja')->where('id', $id)->update([ 'deleted'=> 1 ]);
        $berhasil = ['berhasil menghapus diskon_belanja dengan id : ' .$id];
        return json_encode($berhasil);
     }

     public function undelete($id)
     {
        DB::table('diskon_belanja')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data diskon_belanja yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
     }

}
