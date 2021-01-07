<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mobil;
use App\Models\User;

class MobilController extends Controller
{

	public function index()
    {
        $data_mobil=Mobil::all();
        $kategori = DB::table('kategori_mkns')->get();
    	$data=User::where('level','mobil')->get();
    	return view('detailpaket.mobil',['data_mobil' => $data_mobil, 'kategori'=>$kategori,'data'=>$data]);
    }

    public function create(Request $request)
    {
        $id_mobil = 'mbl-' .rand();
        $mobil = new Mobil;
        $mobil->id_mobil=$id_mobil;
        $mobil->nama_mobil=$request->nama;
        $mobil->paket_mobil=$request->paket;
        $mobil->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$mobil= Mobil::find($id);
    	$mobil->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$mobil= Mobil::find($id);
    	$mobil->delete($mobil);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
