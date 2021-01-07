<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class jadwaluser extends Model
{
    protected $table = 'jdwl';
    protected $fillable = ['id','id_jadwal', 'nama_MPAnMPI', 'no_HP1', 'no_HP2', 'lokasi_resepsi', 'tgl_resepsi', 'jam_temu', 'jam_resepsi', 'lokasi_akad', 'tgl_akad', 'jam_akad', 'warna_tema', 'perias', 'dokumentasi', 'paket_dok', 'tambah_dok', 'dekorasi', 'paket_dek', 'tambah_dek', 'hiburan', 'paket_hiburan', 'mc', 'paket_mc', 'tambah_rias', 'makan', 'status','foto_dekor', 'foto_both'];

    public function getTglResepsiAttribute()
    {
    	return Carbon::parse($this->attribute['tgl_resepsi'])->format('d-m-Y');
    }

    public function getTglAkadAttribute()
    {
    	return Carbon::parse($this->attribute['tgl_akad'])->format('d-m-Y');
    }
}
