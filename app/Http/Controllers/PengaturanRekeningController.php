<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PengaturanRekeningController extends Controller
{
    public function index()
    {
        $pengaturan_rekening = DB::table('pengaturan_rekening')->where('pengaturan_rekening.deleted', 0)->get();
        $data['pengaturan_rekening'] = $pengaturan_rekening;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pengaturan_rekening = DB::table('pengaturan_rekening')->where('deleted', 0)->where('id', $id)->get();
        $data['pengaturan_rekening'] = $pengaturan_rekening;
        return json_encode($data);
    }

    public function carinamabank($nama_bank)
    {
        $pengaturan_rekening = DB::table('pengaturan_rekening')->where('deleted', 0)->where('nama_bank', 'LIKE', '%' . $nama_bank . '%')->get();
        $data['pengaturan_rekening'] = $pengaturan_rekening;
        return json_encode($data);
    }

    public function carinomorrekening($nomor_rekening)
    {
        $pengaturan_rekening = DB::table('pengaturan_rekening')->where('deleted', 0)->where('nomor_rekening', 'LIKE', '%' . $nomor_rekening . '%')->get();
        $data['pengaturan_rekening'] = $pengaturan_rekening;
        return json_encode($data);
    }

    public function caripemilikrekening($pemilik_rekening)
    {
        $pengaturan_rekening = DB::table('pengaturan_rekening')->where('deleted', 0)->where('pemilik_rekening', 'LIKE', '%' . $pemilik_rekening . '%')->get();
        $data['pengaturan_rekening'] = $pengaturan_rekening;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pengaturan_rekening')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pengaturan_rekening')->where('deleted', 0)->where('id', $id)->update($request->all());
        $ubah = DB::table('pengaturan_rekening')->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    public function hapus($id)
    {
        DB::update('update pengaturan_rekening set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di delete'];
        return json_encode($berhasil);
    }

    public function unhapus($id)
    {
        DB::update('update pengaturan_rekening set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di restore'];
        return json_encode($berhasil);
    }
}
