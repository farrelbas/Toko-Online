<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $data = Admin::get();
        return response()->json($data);
    }
    public function detailadmin($id_admin)
    {
        $detail = Admin::where('id_admin', $id_admin)->first();
        return Response()->json($detail);
    }
    public function insert_admin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'username_admin' => 'required',
            'password_admin' => 'required',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        $simpan = Admin::create([
            'nama_admin' => $request->nama_admin,
            'username_admin' => $request->username_admin,
            'password_admin' => $request->password_admin,
            'level' => $request->level,
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
    public function update_admin($id_admin, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_admin' => 'required',
            'username_admin' => 'required',
            'password_admin' => 'required',
            'level' => 'required',
        ]);
        if ($validator->fails()) {
            $data['status'] = false;
            $data['message'] = $validator->errors();
            return Response()->json($data);
        }
        $simpan = Admin::where('id_admin', $id_admin)->update([
            'nama_admin' => $request->nama_admin,
            'username_admin' => $request->username_admin,
            'password_admin' => $request->password_admin,
            'level' => $request->level,
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
    public function delete_admin($id_admin)
    {
        $hapus = Admin::where('id_admin', $id_admin)->delete();
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
