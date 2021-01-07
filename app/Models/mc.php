<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mc extends Model
{
    protected $table = 'mc';
    protected $fillable = ['id_mc','nama_mc', 'paket_mc', 'id_paket'];
}
