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
Route::get("/get_produk", "ProdukController@index");
Route::get("/get_detail_produk/{id_produk}", "ProdukController@detailproduk");
Route::post('/produk', 'ProdukController@insert_produk');
Route::put("/update_produk/{id_produk}", "ProdukController@update_produk");
Route::delete("/delete_produk/{id_produk}", "ProdukController@delete_produk");

// PELANGGAN
Route::get("/get_pelanggan", "PelangganController@index");
Route::get("/get_detail_pelanggan/{id_pelanggan}", "PelangganController@detailpelanggan");
Route::post('/pelanggan', 'PelangganController@insert_pelanggan');
Route::put("/update_pelanggan/{id_pelanggan}", "PelangganController@update_pelanggan");
Route::delete("/delete_pelanggan/{id_pelanggan}", "PelangganController@delete_pelanggan");

// ADMIN
Route::get("/get_admin", "AdminController@index");
Route::get("/get_detail_admin/{id_admin}", "AdminController@detailadmin");
Route::post('/admin', 'AdminController@insert_admin');
Route::put("/update_admin/{id_admin}", "AdminController@update_admin");
Route::delete("/delete_admin/{id_admin}", "AdminController@delete_admin");

// TRANSAKSI
Route::post('/transaksi', 'TransaksiController@insert_transaksi');

// DETAIL TRANSAKSI
Route::post('/detail_transaksi', 'DetailTransaksiController@insert_detail_transaksi');
