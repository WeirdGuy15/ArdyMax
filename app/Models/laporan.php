<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class laporan extends Model
{
    protected $table = 'laporan';
    protected $fillable = ['nama_MPAnMPI', 'no_HP1', 'no_HP2', 'paket', 'tgl_resepsi'];

    protected $dates = ['tgl_resepsi',];
    
    public function getTglResepsiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
