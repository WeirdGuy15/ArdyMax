<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\dok;
use App\Models\User;

class dokController extends Controller
{

	public function index()
    {
        $data_dok= dok::all();
        $kategori = DB::table('kategori_mkns')->get();
    	$data= User::where('level','Dokumentasi')->get();
    	return view('detailpaket.dok',['data_dok' => $data_dok,'data'=>$data, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {
        $id_dok = "dkm-" . rand();
        $dok = new dok;
        $dok->id_dok=$id_dok;
        $dok->nama_dok=$request->nama;
        $dok->paket_dok=$request->paket;
        $dok->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$dok= dok::find($id);
    	$dok->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$dok= dok::find($id);
    	$dok->delete($dok);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
