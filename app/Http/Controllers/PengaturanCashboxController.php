<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengaturanCashboxController extends Controller
{
    public function index()
    {
        $pengaturan_cashbox = DB::table('pengaturan_cashbox')->where('pengaturan_cashbox.deleted', 0)->get();
        $data['pengaturan_cashbox'] = $pengaturan_cashbox;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pengaturan_cashbox = DB::table('pengaturan_cashbox')->where('deleted', 0)->where('id', $id)->get();
        $data['pengaturan_cashbox'] = $pengaturan_cashbox;
        return json_encode($data);
    }

    public function carinamaakun($nama_akun)
    {
        $pengaturan_cashbox = DB::table('pengaturan_cashbox')->where('deleted', 0)->where('nama_akun', 'LIKE', '%' . $nama_akun . '%')->get();
        $data['pengaturan_cashbox'] = $pengaturan_cashbox;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pengaturan_cashbox')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pengaturan_cashbox')->where('deleted', 0)->where('id', $id)->update($request->all());
        $ubah = DB::table('pengaturan_cashbox')->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    public function hapus($id)
    {
        DB::update('update pengaturan_cashbox set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di delete'];
        return json_encode($berhasil);
    }

    public function unhapus($id)
    {
        DB::update('update pengaturan_cashbox set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di restore'];
        return json_encode($berhasil);
    }
}
