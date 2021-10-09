<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    public $timestamps = false;

    protected $fillable = ['nama_produk', 'harga', 'stok', 'deskripsi', 'foto'];
}
