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

// PELANGGAN
Route::post('/pelanggan', 'ProdukController@insert_pelanggan');

// ADMIN
Route::post('/admin', 'ProdukController@insert_admin');

// TRANSAKSI
Route::post('/transaksi', 'ProdukController@insert_transaksi');

// DETAIL TRANSAKSI
Route::post('/detail_transaksi', 'ProdukController@insert_detail_transaksi');
