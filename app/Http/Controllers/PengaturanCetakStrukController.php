<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengaturanCetakStrukController extends Controller
{
    public function index()
    {
        $pengaturan_cetak_struk = DB::table('pengaturan_cetak_struk')->get();
        $data['pengaturan_cetak_struk'] = $pengaturan_cetak_struk;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pengaturan_cetak_struk = DB::table('pengaturan_cetak_struk')->where('id', $id)->get();
        $data['pengaturan_cetak_struk'] = $pengaturan_cetak_struk;
        return json_encode($data);
    }

    public function caripanjangkarakterstruk($panjang_karakter_struk)
    {
        $pengaturan_cetak_struk = DB::table('pengaturan_cetak_struk')->where('panjang_karakter_struk', 'LIKE', '%' . $panjang_karakter_struk . '%')->get();
        $data['pengaturan_cetak_struk'] = $pengaturan_cetak_struk;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pengaturan_cetak_struk')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pengaturan_cetak_struk')->where('id', $id)->update($request->all());
        $ubah = DB::table('pengaturan_cetak_struk')->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    // public function hapus($id)
    // {
    //     DB::update('update pengaturan_cetak_struk set deleted = 1 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di delete'];
    //     return json_encode($berhasil);
    // }

    // public function unhapus($id)
    // {
    //     DB::update('update pengaturan_cetak_struk set deleted = 0 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di restore'];
    //     return json_encode($berhasil);
    // }
}
