<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PemindahanSaldoController extends Controller
{
    public function kabeh()
    {
        $pemindahan_saldo = DB::table('pemindahan_saldo')->where('deleted', 0)->get();
        $data['pemindahan_saldo'] = $pemindahan_saldo;
        return json_encode($data);
    }

    public function index()
    {
        $pemindahan_saldo = DB::table('pemindahan_saldo')->select('pemindahan_saldo.*','pengaturan_cashbox.nama_akun as cashbox_ambil')->from('pemindahan_saldo')->join('pengaturan_cashbox', 'pemindahan_saldo.cashbox_id_ambil', 'pengaturan_cashbox.id')->where('pemindahan_saldo.deleted', 0)->get();
        $data['pemindahan_saldo'] = $pemindahan_saldo;
        return json_encode($data);
    }

    public function cari($id)
    {
        $pemindahan_saldo = DB::table('pemindahan_saldo')->where('deleted', 0)->where('id', $id)->get();
        $data['pemindahan_saldo'] = $pemindahan_saldo;
        return json_encode($data);
    }

    public function caritanggal($tanggal)
    {
        $pemindahan_saldo = DB::table('pemindahan_saldo')->where('deleted', 0)->where('tanggal', 'LIKE', '%' . $tanggal . '%')->get();
        $data['pemindahan_saldo'] = $pemindahan_saldo;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('pemindahan_saldo')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('pemindahan_saldo')->where('deleted', 0)->where('id', $id)->update($request->all());
        $ubah = DB::table('pemindahan_saldo')->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    public function hapus($id)
    {
        DB::update('update pemindahan_saldo set deleted = 1 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di delete'];
        return json_encode($berhasil);
    }

    public function unhapus($id)
    {
        DB::update('update pemindahan_saldo set deleted = 0 where id = ' . $id);
        $berhasil = ['id = ' . $id . ' berhasil di restore'];
        return json_encode($berhasil);
    }
}
