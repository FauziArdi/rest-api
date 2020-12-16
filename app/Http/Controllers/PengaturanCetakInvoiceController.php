<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengaturanCetakInvoiceController extends Controller
{
    public function index()
    {
        $pengaturan_cetak_invoice = DB::table('pengaturan_cetak_invoice')->get();
        $data['pengaturan_cetak_invoice'] = $pengaturan_cetak_invoice;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pengaturan_cetak_invoice = DB::table('pengaturan_cetak_invoice')->where('id', $id)->get();
        $data['pengaturan_cetak_invoice'] = $pengaturan_cetak_invoice;
        return json_encode($data);
    }

    public function caripanjangkarakter($panjang_karakter)
    {
        $pengaturan_cetak_invoice = DB::table('pengaturan_cetak_invoice')->where('panjang_karakter', 'LIKE', '%' . $panjang_karakter . '%')->get();
        $data['pengaturan_cetak_invoice'] = $pengaturan_cetak_invoice;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pengaturan_cetak_invoice')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pengaturan_cetak_invoice')->where('id', $id)->update($request->all());
        $ubah = DB::table('pengaturan_cetak_invoice')->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    // public function hapus($id)
    // {
    //     DB::update('update pengaturan_cetak_invoice set deleted = 1 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di delete'];
    //     return json_encode($berhasil);
    // }

    // public function unhapus($id)
    // {
    //     DB::update('update pengaturan_cetak_invoice set deleted = 0 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di restore'];
    //     return json_encode($berhasil);
    // }
}
