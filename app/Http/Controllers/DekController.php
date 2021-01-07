<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Dek;
use App\Models\User;

class dekController extends Controller
{

	public function index()
    {
        $data_dek= Dek::all();
        $kategori = DB::table('kategori_mkns')->get();
    	$data= User::where('level','Dekorasi')->get();
    	return view('detailpaket.dek',['data_dek' => $data_dek, 'data'=>$data, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {
        $id_dek = "dkr-" . rand();
        $dek = new Dek;
        $dek->id_dek=$id_dek;
        $dek->nama_dek=$request->nama;
        $dek->paket_dek=$request->paket;
        $dek->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$dek= Dek::find($id);
    	$dek->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$dek= Dek::find($id);
    	$dek->delete($dek);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
