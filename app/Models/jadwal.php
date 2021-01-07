<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class jadwal extends Model
{
    protected $table = 'jdwl';
    protected $fillable = ['id','id_jadwal', 'nama_MPAnMPI', 'no_HP1', 'no_HP2', 'paket', 'lokasi_resepsi', 'tgl_resepsi', 'jam_temu', 'jam_resepsi', 'lokasi_akad', 'tgl_akad', 'jam_akad', 'jenis_rias', 'warna_tema', 'perias', 'dokumentasi', 'paket_dok', 'tambah_dok', 'dekorasi', 'paket_dek', 'tambah_dek', 'hiburan', 'paket_hiburan', 'mc', 'paket_mc', 'tambah_rias', 'makan', 'status', 'foto_gaun', 'foto_dekor', 'foto_both', 'mobil','paket_mobil','tenda','paket_tenda', 'tambah_mc','tambah_hiburan', 'catatan'];


    protected $dates = ['tgl_resepsi', 'tgl_akad'];
    
    public function getTglResepsiAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getTglAkadAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    
}


