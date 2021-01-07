<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use DB;
use App\Models\Customer;
use App\Models\jadwaluser;
use Carbon\Carbon;

class ApiController extends Controller
{
	//JADWAL
    public function awal()
    {
        $jdwl=\App\jadwal::orderby('tgl_resepsi','desc')->get();
        return response()->json($jdwl);
    }

    public function form()
    {
        $paket_nikah=\App\paket::all();
        $paket_dok=\App\dok::all();
        $fotografer=\App\User::where('level','Dokumentasi')->get();
        $paket_Dek=\App\Dek::all();
        $dekorasi=\App\User::where('level','Dekorasi')->get();
        $paket_hiburan=\App\hiburan::all();
        $hiburan1=\App\User::where('level','Hiburan')->get();
        $paket_mc=\App\mc::all();
        $mc1=\App\User::where('level','Mc')->get();
        $paket_rias=\App\Rias::all();
        $perias=\App\User::where('level','Rias')->get();
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
        $jenisrias =\App\jenisrias::all();
        $cuculampah = \App\cuculampah::all();

        return response()->json(['desert'=>$desert,'ikan'=>$ikan,'minum'=>$minum,'nasi'=>$nasi,'snack'=>$snack,
        	'ayam'=>$ayam,'sayur'=>$sayur,'sup'=>$sup,'paket_nikah'=>$paket_nikah,
            'paket_dok'=>$paket_dok, 'paket_Dek'=>$paket_Dek, 'paket_hiburan'=>$paket_hiburan,
            'paket_mc'=>$paket_mc, 'fotografer'=>$fotografer, 'dekorasi'=>$dekorasi,
            'paket_rias'=>$paket_rias, 'perias'=>$perias, 'hiburan1'=>$hiburan1, 'mc1'=>$mc1, 
            'cuculampah'=>$cuculampah, 'jenisrias'=>$jenisrias, 'catering'=>$catering , 'tenda'=>$tenda,
            'paket_tenda'=>$paket_tenda,'mobil'=>$mobil,'paket_mobil'=>$paket_mobil]);
        
    }

    public function tambah(Request $request)
    { 
        $nama = "{$request->nama_MPA} & {$request->nama_MPI}";
        $makanan = "{$request->sup}, {$request->ayam}, {$request->sayur}, {$request->snack}, {$request->nasi}, {$request->minum}, {$request->ikan}, {$request->desert}, {$request->tambah_makan}";
        
        
        
        $jdwl = new \App\jadwal;
        $jdwl->id_jadwal=$request->id_jadwal;
        $jdwl->nama_MPAnMPI=$nama;
        $jdwl->no_HP1=$request->no_HP1;
        $jdwl->no_HP2=$request->no_HP2;
        $jdwl->paket=$request->paket;
        $jdwl->lokasi_resepsi=$request->lokasi_resepsi;
        $jdwl->tgl_resepsi= Carbon::createFromFormat('d-m-Y', $request->tgl_resepsi)->format('d-m-Y');
        $jdwl->jam_resepsi=$request->jam_resepsi;
        $jdwl->jam_temu=$request->jam_temu;
        $jdwl->lokasi_akad=$request->lokasi_akad;
        $jdwl->tgl_akad=$request->tgl_akad;
        $jdwl->jenis_rias=$request->jenis_rias;
        $jdwl->cucu_lampah=$request->cucu_lampah;
        $jdwl->catering=$request->catering;
        $jdwl->jam_akad=$request->jam_akad;
        $jdwl->warna_tema=$request->warna_tema;
        $jdwl->perias=$request->perias;
        $jdwl->paket_rias=$request->paket_rias;
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
        $jdwl->tambah_hiburan= $request->tambah_hiburan;
        $jdwl->mobil = $request->mobil;
        $jdwl->paket_mobil = $request->paket_mobil;
        $jdwl->tenda = $request->tenda;
        $jdwl->paket_tenda= $request->paket_tenda;
        $jdwl->catatan = $request->catatan;
        $jdwl->status="Dikerjakan";
        
        $jdwl->foto_gaun=$request->filename_gaun;
        $jdwl->foto_both=$request->filename_both;
        $jdwl->foto_dekor=$request->filename_dekor; 
        
        
        
        if ($request->filename_gaun != '') {
            $gaun = base64_decode($request->foto_gaun);
            file_put_contents("images/".$request->filename_gaun,$gaun);
        }
        if ($request->filename_both != '') {
            $both = base64_decode($request->foto_both);
            file_put_contents("images/".$request->filename_both,$both);
            
        }if ($request->filename_dekor != '') {
            $dekor = base64_decode($request->foto_dekor);
            file_put_contents("images/".$request->filename_dekor,$dekor);
        }
        
        $jdwl->save();

        $customer = new Customer;
        $customer->nama = $request->nama_MPA;
        $customer->no_telp = $request->no_HP1;
        $customer->uid = Str::random(100);
        $customer->token = Str::random(100);
        $customer->save();

        return response()->json($jdwl);
    }

    public function lihatjadwal($id)
    {
        $jadwal= \App\jadwal::find($id);
        return response()->json($jadwal);
    }

    public function updatejadwal(Request $request,$id)
    {
        $data= \App\jadwal::find($request->id);
        $nama = "{$request->nama_MPA} & {$request->nama_MPI}";
        $makanan = "{$request->sup}, {$request->ayam}, {$request->sayur}, {$request->snack}, {$request->nasi}, {$request->minum}, {$request->ikan}, {$request->desert}, {$request->tambah_makan}";

        $form_data = array(
            'id_jadwal'=> $request->id_jadwal,
            'nama_MPAnMPI'=>  $nama,
            'no_HP1'=>  $request->no_HP1,
            'no_HP2'=>  $request->no_HP2,
            'paket'=> $request->paket,
            'lokasi_resepsi'=> $request->lokasi_resepsi,
            'tgl_resepsi'=> Carbon::createFromFormat('d-m-Y', $request->tgl_resepsi)->format('Y-m-d'),
            'jam_resepsi'=> $request->jam_resepsi,
            'jam_temu'=> $request->jam_temu,
            'lokasi_akad'=> $request->lokasi_akad,
            'tgl_akad'=> Carbon::createFromFormat('d-m-Y', $request->tgl_akad)->format('Y-m-d'),
            'jenis_rias'=> $request->jenis_rias,
            'cucu_lampah'=> $request->cucu_lampah,
            'catering'=> $request->catering,
            'jam_akad'=> $request->jam_akad,
            'warna_tema'=> $request->warna_tema,
            'perias'=> $request->perias,
            'paket_rias'=> $request->paket_rias,
            'tambah_rias'=> $request->tambah_rias,
            'dokumentasi'=> $request->dokumentasi,
            'paket_dok'=> $request->paket_dok,
            'tambah_dok'=> $request->tambah_dok,
            'dekorasi'=> $request->dekorasi,
            'paket_dek'=> $request->paket_dek,
            'tambah_dek'=> $request->tambah_dek,
            'hiburan'=> $request->hiburan,
            'paket_hiburan'=> $request->paket_hiburan,
            'mc'=> $request->mc,
            'paket_mc'=> $request->paket_mc,
            'makan'=> $makanan,
            'tambah_mc'=> $request->tambah_mc;
            'tambah_hiburan'=>  $request->tambah_hiburan;
            'mobil' =>  $request->mobil;
            'paket_mobil' =>  $request->paket_mobil;
            'tenda' =>  $request->tenda;
            'paket_tenda'=>  $request->paket_tenda;
            'catatan' =>  $request->catatan;
            'foto_gaun' => $request->filename_gaun,
            'foto_dekor' => $request->filename_dekor,
            'foto_both' => $request->filename_both,
        );

        \App\jadwal::whereId($request->id)->update($form_data);
        
        if ($request->filename_gaun != '') {
            $gaun = base64_decode($request->foto_gaun);
            file_put_contents("images/".$request->filename_gaun,$gaun);
        }
        if ($request->filename_both != '') {
            $both = base64_decode($request->foto_both);
            file_put_contents("images/".$request->filename_both,$both);
            
        }if ($request->filename_dekor != '') {
            $dekor = base64_decode($request->foto_dekor);
            file_put_contents("images/".$request->filename_dekor,$dekor);
        }
        
        return response()->json($data);
    } 
    
    public function deletejadwal($id)
    {
        $jadwal= \App\jadwal::find($id);
        $jadwal->delete();
        return response()->json('success');
    }

    public function jadwaluser(Request $request)
    {
        $nama = $request->get('nama');

        $jadwal = jadwaluser::where('dokumentasi', 'LIKE', '%'.$nama.'%')
                    ->orWhere('dekorasi', 'LIKE', '%'.$nama.'%')
                    ->orWhere('perias', 'LIKE', '%'.$nama.'%')
                    ->orWhere('hiburan', 'LIKE', '%'.$nama.'%')
                    ->orWhere('mc', 'LIKE', '%'.$nama.'%')
                    ->orWhere('catering', 'LIKE', '%'.$nama.'%')
                    ->select('id','id_jadwal', 'nama_MPAnMPI', 'lokasi_resepsi', 'tgl_resepsi', 'jam_temu', 'jam_resepsi', 'lokasi_akad', 'tgl_akad', 'jam_akad', 'warna_tema', 'perias','paket_rias', 'dokumentasi', 'paket_dok', 'tambah_dok', 'dekorasi', 'paket_dek', 'tambah_dek', 'hiburan', 'paket_hiburan', 'mc', 'paket_mc', 'cucu_lampah', 'tambah_rias', 'catering','makan',  'status','foto_dekor', 'foto_both', 'cucu_lampah' )
                    ->orderByRaw('MONTH(tgl_resepsi) DESC')
                    ->orderByRaw('DAY(tgl_resepsi) DESC')
                    ->orderByRaw('YEAR(tgl_resepsi) DESC')
                    ->get();
                    

        return response()->json([
           'nama' => $jadwal
        ]);
    }

     
    
    //Laporan
    public function history()
     {
        $laporan= \App\laporan::orderBy('tgl_resepsi', 'ASC')->get();
        return response()->json($laporan);
    }

    public function sudah(Request $request,$id)
    {
        $jadwal = DB::table('jadwal')->where('id', $id)->get();
        foreach ($jadwal as $jdwl) {
            $laporan= new \App\laporan;
            $laporan->nama_MPAnMPI=$jdwl->nama_MPAnMPI;
            $laporan->no_HP1=$jdwl->no_HP1;
            $laporan->no_HP2=$jdwl->no_HP2;
            $laporan->paket=$jdwl->paket;
            $laporan->tgl_resepsi=$jdwl->tgl_resepsi;
            $laporan->id_jadwal=$jdwl->id_jadwal;
            $laporan->save();
        }
        

        DB::table('jdwl')->where('id', $request->id)->update(['status'=>'selesai']);

        return response()->json($laporan);
    }
    
    public function viewhistory($id)
    {
        $laporan= \App\laporan::find($id);
        return response()->json($laporan);
    }
   
       public function viewedit($id)
    {
    	$jadwal= \App\jadwal::find($id);
        $paket_nikah=\App\paket::all();
        $paket_dok=\App\dok::all();
        $fotografer=\App\User::where('level','Dokumentasi')->get();
        $paket_Dek=\App\Dek::all();
        $dekorasi=\App\User::where('level','Dekorasi')->get();
        $paket_hiburan=\App\hiburan::all();
        $hiburan1=\App\User::where('level','Hiburan')->get();
        $paket_mc=\App\mc::all();
        $mc1=\App\User::where('level','Mc')->get();
        $jenis_rias=\App\Rias::all();
        $perias=\App\User::where('level','Rias')->get();
        $catering=\App\User::where('level','Catering')->get();
        $jenisrias =\App\jenisrias::all();
        $cuculampah = \App\cuculampah::all();
    	return response()->json(['jadwal'=>$jadwal, 'paket_nikah'=>$paket_nikah,
            'paket_dok'=>$paket_dok, 'paket_Dek'=>$paket_Dek, 'paket_hiburan'=>$paket_hiburan,
            'paket_mc'=>$paket_mc, 'fotografer'=>$fotografer, 'dekorasi'=>$dekorasi,
         'jenis_rias'=>$jenis_rias, 'perias'=>$perias, 'hiburan1'=>$hiburan1, 'mc1'=>$mc1, 'cuculampah'=>$cuculampah, 'jenisrias'=>$jenisrias, 'catering'=>$catering]);
    }
    

    
    
    public function image($fileName)
    {
        $path = public_path('/images/' . $fileName);
        return response()->file($path);        
    }

    //CUSTOMER
    public function loginnumber(Request $request){
       $ceklogin = Customer::where('no_telp', $request->telepon)->first();
       if($ceklogin != null){
            $token = array(
                "token"=> Str::random(100)
                );
            $update_token = DB::table("customer")->where('no_telp', $request->telepon)->update($token);
            return response()->json(['error' => true]);
        }else{
            return response()->json([
                'error' => false
                ]);
        }
   }
}
