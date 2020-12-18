<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = DB::table('customer')->where('deleted', 0)->get();
        $data['customer']=$customer;
        return json_encode($data);

    }

    public function cari($id)
    {
        $customer = DB::table('customer')->where('deleted', 0)->where('id', $id)->get();
        $data['customer']=$customer;
        return json_encode($data);
     }

     public function caribro($nama)
     {
        $customer = DB::table('customer')->where('deleted', 0)->where('nama_lengkap','LIKE', '%'.$nama.'%')->get();
        $data['customer']=$customer;
        return json_encode($data);
     }

     public function create(Request $request)
     {
        DB::table('customer')->insert($request->all());
        $berhasil = ['berhasil menambah customer'];
        return json_encode($berhasil);
     }
     public function edit( Request $request, $id)
     {
        DB::table('customer')->where('deleted', 0)->where('id', $id)->update($request->all());
        $berhasil = DB::table('customer') ->where('deleted', 0)->where('id', $id)->get();
        return json_encode('berhasil mengedit'.$berhasil);
     }

     public function delete($id)
     {
        DB::update ('update customer set deleted = 1 where id = '.$id);
        $berhasil = ['berhasil menghapus customer dengan id : ' .$id];
        return json_encode($berhasil);
     }
     public function undelete($id)
     {
        DB::update ('update customer set deleted = 0 where id = '.$id);
        $berhasil = ['berhasil mengembalikan customer yang terhapus, yaitu customer dengan id : ' .$id];
        return json_encode($berhasil);
     }

}

