<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rias extends Model
{
    protected $table = 'rias';
    protected $fillable = ['id_rias','perias', 'paket_rias', 'id_paket'];
}
