<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class PenambahanSaldoController extends Controller
{
    public function kabeh()
    {
        $penambahan_saldo = DB::table('penambahan_saldo')->get();
        $data['penambahan_saldo'] = $penambahan_saldo;
        return json_encode($data);
    }

    public function index()
    {
        $penambahan_saldo = DB::table('penambahan_saldo')->select('penambahan_saldo.*','pengaturan_cashbox.nama_akun as cashbox')->from('penambahan_saldo')->join('pengaturan_cashbox', 'penambahan_saldo.cashbox_id', 'pengaturan_cashbox.id')->get();
        $data['penambahan_saldo'] = $penambahan_saldo;
        return json_encode($data);
    }

    public function cari($id)
    {
        $penambahan_saldo = DB::table('penambahan_saldo')->where('id', $id)->get();
        $data['penambahan_saldo'] = $penambahan_saldo;
        return json_encode($data);
    }

    public function caritanggal($tanggal)
    {
        $penambahan_saldo = DB::table('penambahan_saldo')->where('tanggal', 'LIKE', '%' . $tanggal . '%')->get();
        $data['penambahan_saldo'] = $penambahan_saldo;
        return json_encode($data);
    }

    public function tambah(Request $request)
    {
        DB::table('penambahan_saldo')->insert($request->all());
        return json_encode('berhasil menambah');
    }

    public function ubah(Request $request, $id)
    {
        DB::table('penambahan_saldo')->where('id', $id)->update($request->all());
        $ubah = DB::table('penambahan_saldo')->where('id', $id)->get();
        return json_encode('berhasil mengubah mejadi ' . $ubah);
    }

    // public function hapus($id)
    // {
    //     DB::update('update penambahan_saldo set deleted = 1 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di delete'];
    //     return json_encode($berhasil);
    // }

    // public function unhapus($id)
    // {
    //     DB::update('update penambahan_saldo set deleted = 0 where id = ' . $id);
    //     $berhasil = ['id = ' . $id . ' berhasil di restore'];
    //     return json_encode($berhasil);
    // }
}
