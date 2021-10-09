<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    public $timestamps = false;

    protected $fillable = ['nama_pelanggan', 'alamat', 'no_hp', 'username_pelanggan', 'password_pelanggan'];
}
