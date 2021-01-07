<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dek extends Model
{
    protected $table = 'dek';
    protected $fillable = ['id_dek','nama_dek', 'paket_dek', 'id_paket'];
}
