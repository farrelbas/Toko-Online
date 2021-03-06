<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;
use Illuminate\Support\Facades\Validator;

class PelangganController extends Controller
{
    public function index()
    {
        $data = Pelanggan::get();
        return response()->json($data);
    }
    public function detailpelanggan($id_pelanggan)
    {
        $detail = Pelanggan::where('id_pelanggan', $id_pelanggan)->first();
        return Response()->json($detail);
    }
    public function insert_pelanggan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username_pelanggan' => 'required',
            'password_pelanggan' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        $simpan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => $request->password_pelanggan,
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
    public function update_pelanggan($id_pelanggan, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'username_pelanggan' => 'required',
            'password_pelanggan' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        $simpan = Pelanggan::where('id_pelanggan', $id_pelanggan)->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'username_pelanggan' => $request->username_pelanggan,
            'password_pelanggan' => $request->password_pelanggan,
        ]);
        if ($simpan) {
            $data['status'] = true;
            $data['message'] = "Sukses update data";
        } else {
            $data['status'] = false;
            $data['message'] = "Gagal update data";
        }
        return Response()->json($data);
    }
    public function delete_pelanggan($id_pelanggan)
    {
        $hapus = Pelanggan::where('id_pelanggan', $id_pelanggan)->delete();
        if ($hapus) {
            $data['status'] = true;
            $data['message'] = "Sukses delete data";
        } else {
            $data['status'] = false;
            $data['message'] = "Gagal delete data";
        }
        return Response()->json($data);
    }
}
