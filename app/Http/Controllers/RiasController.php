<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Rias;
use App\Models\User;

class RiasController extends Controller
{

	public function index()
    {
    	$data_rias= Rias::all();
        $data= User::where('level','Rias')->get();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('detailpaket.rias',['data_rias' => $data_rias, 'kategori'=>$kategori,'data'=>$data]);
    }

    public function create(Request $request)
    {
        $id_rias = "rs-" . rand();
        $rias = new Rias;
        $rias->id_rias=$id_rias;
        $rias->nama_rias=$request->nama_rias;
        $rias->paket_rias=$request->paket_rias;
        $rias->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$rias= Rias::find($id);
    	$rias->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$rias= Rias::find($id);
    	$rias->delete($rias);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
