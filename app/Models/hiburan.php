<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class hiburan extends Model
{
    protected $table = 'hiburan';
    protected $fillable = ['id_hiburan','nama_hiburan', 'paket_hiburan', 'id_paket'];
}
