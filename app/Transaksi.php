<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    public $timestamps = false;

    protected $fillable = ['tanggal_transaksi', 'id_pelanggan', 'status'];
}
