<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = DB::table('kategori')->where('deleted', 0)->get();
        $data['kategoris'] = $kategoris;
        return json_encode($data);
    }

    public function cari($id)
    {
        $kategoris = DB::table('kategori')->where('deleted', 0)->where('id', $id)->get();
        $data['kategoris'] = $kategoris;
        return json_encode($data);
    }

    public function carinama($nama)
    {
        $kategoris = DB::table('kategori')->where('deleted', 0)->where('nama', 'LIKE', '%' . $nama . '%')->get();
        $data['kategoris'] = $kategoris;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('kategori')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('kategori')->where('deleted', 0)->where('id', $id)->update($request->all());
        $ubah = DB::table('kategori')->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    // public function tambah($kategori)
    // {
    //     DB::table('kategori')->insert(array('nama' => $kategori));
    //     $berhasil = ['berhasil menambah', $kategori];
    //     return json_encode($berhasil);
    // }

    // public function ubah($id, $nama)
    // {
    //     // DB::table('kategori')->where('id', $id)->set(array('nama' => $nama));
    //     DB::update('update kategori set nama = "' . $nama . '" where deleted = 0 and id = ' . $id);
    //     $berhasil = ['berhasil mengubah kategori dengan id = ', $id, 'menjadi', $nama];
    //     return json_encode($berhasil);
    // }

    public function hapus($id)
    {
        DB::update('update kategori set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di delete'];
        return json_encode($berhasil);
    }
}
