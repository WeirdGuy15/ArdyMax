<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    protected $table = 'paket';
    protected $fillable = ['id_paket', 'nama_paket', 'id_rias', 'id_dok', 'id_dek', 'id_hiburan', 'id_mc'];
}
