<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori_mkn extends Model
{
    use HasFactory;

    protected $table = 'kategori_mkns';
    protected $fillable = ['id','kategori'];
}
