<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dok extends Model
{
    protected $table = 'dok';
    protected $fillable = ['id_dok','nama_dok', 'paket_dok', 'id_paket'];
}
