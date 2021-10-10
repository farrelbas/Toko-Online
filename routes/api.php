<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// PRODUK
Route::post('/produk', 'ProdukController@insert_produk');
Route::put("/edit_produk/{id_produk}", "ProdukController@edit_produk");

// PELANGGAN
Route::post('/pelanggan', 'PelangganController@insert_pelanggan');
Route::put("/edit_pelanggan/{id_pelanggan}", "PelangganController@edit_pelanggan");

// ADMIN
Route::post('/admin', 'AdminController@insert_admin');
Route::put("/edit_admin/{id_admin}", "AdminController@edit_admin");

// TRANSAKSI
Route::post('/transaksi', 'TransaksiController@insert_transaksi');

// DETAIL TRANSAKSI
Route::post('/detail_transaksi', 'DetailTransaksiController@insert_detail_transaksi');
