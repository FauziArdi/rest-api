<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengaturanPrinterController extends Controller
{
    public function index()
    {
        $pengaturan_printer = DB::table('pengaturan_printer')->get();
        $data['pengaturan_printer'] = $pengaturan_printer;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pengaturan_printer = DB::table('pengaturan_printer')->where('id', $id)->get();
        $data['pengaturan_printer'] = $pengaturan_printer;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pengaturan_printer')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pengaturan_printer')->where('id', $id)->update($request->all());
        $ubah = DB::table('pengaturan_printer')->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    // public function hapus($id)
    // {
    //     DB::update('update pengaturan_printer set deleted = 1 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di delete'];
    //     return json_encode($berhasil);
    // }

    // public function unhapus($id)
    // {
    //     DB::update('update pengaturan_printer set deleted = 0 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di restore'];
    //     return json_encode($berhasil);
    // }
}
