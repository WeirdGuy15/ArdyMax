<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\jadwal;
use App\Models\Customer;
use Str;
use Alert;

class jadwalController extends Controller
{

    public function index()
    {
    	$data_jadwal= jadwal::all();
    	$paket_nikah=\App\Models\paket::all();
    	$paket_dok=\App\Models\dok::all();
        $fotografer=\App\Models\User::where('level','Dokumentasi')->get();
    	$paket_Dek=\App\Models\Dek::all();
        $dekorasi=\App\Models\User::where('level','Dekorasi')->get();
    	$paket_hiburan=\App\Models\hiburan::all();
        $hiburan1=\App\Models\User::where('level','Hiburan')->get();
    	$paket_mc=\App\Models\mc::all();
        $mc1=\App\Models\User::where('level','Mc')->get();
        $rias = \App\Models\Rias::all();
    	$jenis_rias=\App\Models\jenisrias::all();
        $perias=\App\Models\User::where('level','Rias')->get();
        $makanan = DB::table('makan')->get();
        $cucu_lampah = DB::table('cucu_lampah')->get();
        $catering = DB::table('users')->where('level','Catering')->get();
        $sup = \App\Models\Makanan::where('kategori','Sup')->get();
        $sayur = \App\Models\Makanan::where('kategori','Sayur')->get();
        $ayam = \App\Models\Makanan::where('kategori','Ayam')->get();
        $snack = \App\Models\Makanan::where('kategori','Snack')->get();
        $nasi = \App\Models\Makanan::where('kategori','Nasi')->get();
        $minum = \App\Models\Makanan::where('kategori','Minum')->get();
        $ikan = \App\Models\Makanan::where('kategori','Ikan')->get();
        $desert = \App\Models\Makanan::where('kategori','Desert')->get();
        $paket_tenda = DB::table('tendas')->get();
        $tenda = DB::table('users')->where('level','Tenda')->get();
        $paket_mobil = DB::table('mobils')->get();
        $mobil = DB::table('users')->where('level','Mobil')->get();


    	return view('menuadmin.jadwal',['data_jadwal' => $data_jadwal, 'nikah'=>$paket_nikah,
    		'paket_dok'=>$paket_dok, 'paket_dek'=>$paket_Dek, 'paket_hiburan'=>$paket_hiburan,
    		'paket_mc'=>$paket_mc, 'fotografer'=>$fotografer, 'dekorasi'=>$dekorasi, 'rias'=>$rias, 
            'cucu_lampah'=>$cucu_lampah, 'jenis_rias'=>$jenis_rias, 'perias'=>$perias, 'hiburan'=>$hiburan1, 'mc'=>$mc1, 
            'makanan'=>$makanan, 'catering'=>$catering, 'sup'=>$sup, 'sayur'=>$sayur, 'ayam'=>$ayam, 'snack'=>$snack, 
            'nasi'=>$nasi, 'minuman'=>$minum, 'ikan'=>$ikan, 'desert'=>$desert, 'tenda'=>$tenda,'paket_tenda'=>$paket_tenda,
            'mobil'=>$mobil,'paket_mobil'=>$paket_mobil]);
    }

    public function dekor($nama_paket){
        $paket = DB::table('paket')->where('nama_paket',$nama_paket)->first();
        $id = $paket->id_dek;
        $data = DB::table('dek')->where('id', $id)->get();
        return response()->json(['data' => $data]);
     }

     public function dok($nama_paket){
        $paket = DB::table('paket')->where('nama_paket',$nama_paket)->first();
        $id = $paket->id_dok;
        $data = DB::table('dok')->where('id', $id)->get();
        return response()->json(['data' => $data]);
     }
    
     public function rias($nama_paket){
        $paket = DB::table('paket')->where('nama_paket',$nama_paket)->first();
        $id = $paket->id_rias;
        $data = DB::table('rias')->where('id', $id)->get();
        return response()->json(['data' => $data]);
     }

     public function hiburan($nama_paket){
        $paket = DB::table('paket')->where('nama_paket',$nama_paket)->first();
        $id = $paket->id_hiburan;
        $data = DB::table('hiburan')->where('id', $id)->get();
        return response()->json(['data' => $data]);
     }

     public function mc($nama_paket){
        $paket = DB::table('paket')->where('nama_paket',$nama_paket)->first();
        $id = $paket->id_mc;
        $data = DB::table('mc')->where('id', $id)->get();
        return response()->json(['data' => $data]);
     }


    public function create(Request $request)
    {
        $id_jadwal = 'jdwl-' .rand();
        $nama = "{$request->nama_MPA} & {$request->nama_MPI}";
        $makanan = "{$request->sup}, {$request->ayam}, {$request->sayur}, {$request->snack}, {$request->nasi}, {$request->minum}, {$request->ikan}, {$request->desert}, {$request->tambah_makan}";
        $jdwl = new jadwal;
        $jdwl->id_jadwal=$id_jadwal;
        $jdwl->nama_MPAnMPI=$nama;
        $jdwl->no_HP1=$request->no_HP1;
        $jdwl->no_HP2=$request->no_HP2;
        $jdwl->paket=$request->paket;
        $jdwl->lokasi_resepsi=$request->lokasi_resepsi;
        $jdwl->tgl_resepsi=$request->tgl_resepsi;
        $jdwl->jam_resepsi=$request->jam_resepsi;
        $jdwl->jam_temu=$request->jam_temu;
        $jdwl->lokasi_akad=$request->lokasi_akad;
        $jdwl->tgl_akad=$request->tgl_akad;
        $jdwl->jam_akad=$request->jam_akad;
        $jdwl->warna_tema=$request->warna_tema;
        $jdwl->perias=$request->perias;
        $jdwl->paket_rias=$request->paket_rias;
        $jdwl->jenis_rias=$request->jenis_rias;
        $jdwl->tambah_rias=$request->tambah_rias;
        $jdwl->dokumentasi=$request->dokumentasi;
        $jdwl->paket_dok=$request->paket_dok;
        $jdwl->tambah_dok=$request->tambah_dok;
        $jdwl->dekorasi=$request->dekorasi;
        $jdwl->paket_dek=$request->paket_dek;
        $jdwl->tambah_dek=$request->tambah_dek;
        $jdwl->hiburan=$request->hiburan;
        $jdwl->paket_hiburan=$request->paket_hiburan;
        $jdwl->mc=$request->mc;
        $jdwl->paket_mc=$request->paket_mc;
        $jdwl->makan=$makanan;
        $jdwl->tambah_mc=$request->tambah_mc;
        $jdwl->cucu_lampah = $request->cucu_lampah;
        $jdwl->tambah_hiburan= $request->tambah_hiburan;
        $jdwl->mobil = $request->mobil;
        $jdwl->paket_mobil = $request->paket_mobil;
        $jdwl->tenda = $request->tenda;
        $jdwl->paket_tenda= $request->paket_tenda;
        $jdwl->catatan = $request->catatan;
        $jdwl->catering = $request->catering;
        $jdwl->status="Dikerjakan";
        if ($request->hasFile('foto_gaun')) {
            $request->file('foto_gaun')->move('images/',$request->file('foto_gaun')->getClientOriginalName());
            $jdwl->foto_gaun = $request->file('foto_gaun')->getClientOriginalName();
        }
        if ($request->hasFile('foto_dekor')) {
            $request->file('foto_dekor')->move('images/',$request->file('foto_dekor')->getClientOriginalName());
            $jdwl->foto_dekor = $request->file('foto_dekor')->getClientOriginalName();
        }
        if ($request->hasFile('foto_both')) {
            $request->file('foto_both')->move('images/',$request->file('foto_both')->getClientOriginalName());
            $jdwl->foto_both = $request->file('foto_both')->getClientOriginalName();
        }
        $jdwl->save();

        $customer = new Customer;
        $customer->nama = $request->nama_MPA;
        $customer->no_telp = $request->no_HP1;
        $customer->uid = Str::random(100);
        $customer->token = Str::random(100);
        $customer->save();

    	return redirect()->back();
    }


    public function update(Request $request,$id)
    {
    	$jadwal= jadwal::find($id);
        $jadwal->update($request->all());
        if ($request->hasFile('foto_gaun')) {
            $request->file('foto_gaun')->move('images/',$request->file('foto_gaun')->getClientOriginalName());
            $jadwal->foto_gaun = $request->file('foto_gaun')->getClientOriginalName();
            $jadwal->save();
        }
        if ($request->hasFile('foto_dekor')) {
            $request->file('foto_dekor')->move('images/',$request->file('foto_dekor')->getClientOriginalName());
            $jadwal->foto_dekor = $request->file('foto_dekor')->getClientOriginalName();
            $jadwal->save();
        }
        if ($request->hasFile('foto_both')) {
            $request->file('foto_both')->move('images/',$request->file('foto_both')->getClientOriginalName());
            $jadwal->foto_both = $request->file('foto_both')->getClientOriginalName();
            $jadwal->save();
        }
    	
    	return redirect()->back();
    }


    public function delete($id)
    {
        $jadwal= jadwal::find($id);
        $jadwal->delete($jadwal);
        return redirect()->back();

    }

    public function laporan(Request $request,$id)
    {
        $jdwl = DB::table('jdwl')->where('id', $id)->get();
        
        foreach ($jdwl as $jdwl) {
            $laporan= new \App\laporan;
            $laporan->id_jadwal = $jdwl->id_jadwal;
            $laporan->nama_MPAnMPI=$jdwl->nama_MPAnMPI;
            $laporan->no_HP1=$jdwl->no_HP1;
            $laporan->no_HP2=$jdwl->no_HP2;
            $laporan->paket=$jdwl->paket;
            $laporan->tgl_resepsi=$jdwl->tgl_resepsi;
            $laporan->save();
        }
        

        DB::table('jdwl')->where('id', $request->id)->update(['status'=> 'selesai']);

        return redirect()->back();
    }
    
}
