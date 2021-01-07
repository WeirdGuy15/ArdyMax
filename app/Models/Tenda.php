<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenda extends Model
{
    use HasFactory;

    protected $table = 'tendas';
    protected $fillable = ['id_tenda','paket_tenda','nama_tenda'];
}
