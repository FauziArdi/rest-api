<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class JasaController extends Controller
{
    public function index()
    {
        $jasa = DB::table('jasa')->select('jasa.nama as Nama_jasa','jasa.unit','jasa.harga','jasa.keterangan as Keterangan_jasa','kategori.nama as Kategori')->from('jasa')->join('kategori', 'jasa.kategori_id', 'kategori.id')->where('jasa.deleted', 0)->get();
        $data['jasa']=$jasa;
        return json_encode($data);

    }

    public function index_all()
    {
        $jasa = DB::table('jasa')->select('jasa.id','jasa.nama as Nama_jasa','jasa.kode as Kode_jasa','jasa.unit','jasa.harga','jasa.keterangan as Keterangan_jasa','jasa.status_olshop','jasa.status_penjualan','kategori.nama as Kategori')->from('jasa')->join('kategori', 'jasa.kategori_id', 'kategori.id')->where('jasa.deleted', 0)->get();
        $data['jasa']=$jasa;
        return json_encode($data);

    }

    public function cari($id)
    {
        $jasa = DB::table('jasa')->select('jasa.nama as Nama_jasa','jasa.unit','jasa.harga','jasa.keterangan as Keterangan_jasa','kategori.nama as Kategori')->from('jasa')->join('kategori', 'jasa.kategori_id', 'kategori.id')->where('jasa.deleted', 0)->where('jasa.id', $id)->get();
        $data['jasa']=$jasa;
        return json_encode($data);
     }

     public function caribro($nama)
     {
        $jasa = DB::table('jasa')->select('jasa.nama as Nama_jasa','jasa.unit','jasa.harga','jasa.keterangan as Keterangan_jasa','kategori.nama as Kategori')->from('jasa')->join('kategori', 'jasa.kategori_id', 'kategori.id')->where('jasa.deleted', 0)->where('jasa.nama','LIKE', '%'.$nama.'%')->get();
        $data['jasa']=$jasa;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('jasa')->insert($request->all());
        $berhasil = ['berhasil menambah jasa'];
        return json_encode($berhasil);
        // DB::table('jasa')->insert(array(
        //     'nama' => $nama,
        //     'kode' => $kode,
        //     'unit' => $unit,
        //     'harga_dasar' => $harga_dasar,
        //     'harga_jual' => $harga_jual,
        //     'keterangan' => $keterangan,
        //     'berat' => $berat,
        //     'status_olshop' => $status_olshop,
        //     'status_penjualan' => $status_penjualan,
        //     'status_pembelian' => $status_pembelian,
        //     'kategori_id' => $kategori_id,
        //     'total_stock' => $total_stock
        // ));
        // $berhasil = ['berhasil menambah jasa yaitu :', $nama];
        // return json_encode($berhasil);
     }

    public function edit( Request $request, $id)
    {
        DB::table('jasa')->where('deleted', 0)->where('id', $id)->update($request->all());
        $berhasil = DB::table('jasa') ->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
    }


     public function delete($id)
     {
        DB::table('jasa')->where('id', $id)->update([ 'deleted'=>1 ]);
        $berhasil = ['berhasil menghapus jasa dengan id : ' .$id];
        return json_encode($berhasil);
     }

     public function undelete($id)
     {
        DB::table('jasa')->where('id', $id)->update([ 'deleted'=> 0 ]);
        $berhasil = ['berhasil mengembalikan data jasa yang dihapus dengan id :' .$id];
        return json_encode($berhasil);
     }

}
