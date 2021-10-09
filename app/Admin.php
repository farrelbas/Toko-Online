<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admin';
    public $timestamps = false;

    protected $fillable = ['nama_admin', 'username_admin', 'password_admin', 'level'];
}
