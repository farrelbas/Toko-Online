<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::get();
        return response()->json($data);
    }
    public function detailproduk($id_produk)
    {
        $detail = Produk::where('id_produk', $id_produk)->first();
        return Response()->json($detail);
    }
    public function insert_produk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        if ($foto = $request->file('foto')) {
            $destination_path = public_path('/foto_produk/');
            $foto_produk = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
            $foto->move($destination_path, $foto_produk);
        }
        $simpan = Produk::create([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto_produk,
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
    public function update_produk($id_produk, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'deskripsi' => 'required',
            // 'foto' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        // if ($foto = $request->file('foto')) {
        //     $destination_path = public_path('/foto_produk/');
        //     $foto_produk = date('YmdHis') . '.' . $foto->getClientOriginalExtension();
        //     $foto->move($destination_path, $foto_produk);
        // }
        $simpan = Produk::where('id_produk', $id_produk)->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'deskripsi' => $request->deskripsi,
            // 'foto' => $foto_produk,
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
    public function delete_produk($id_produk)
    {
        $hapus = Produk::where('id_produk', $id_produk)->delete();
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
