<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function insert_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal_transaksi' => 'required',
            'id_pelanggan' => 'required',
            'password_admin' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        $simpan = Transaksi::create([
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'id_pelanggan' => $request->id_pelanggan,
            'status' => $request->status,
        ]);
        if ($simpan) {
            $data['status'] = true;
            $data['message'] = "Sukses menambahkan data";
        } else {
            $data['status'] = false;
            $data['message'] = "Gagal menambahkan data";
        }
        return Response()->json($data);
    }
}
