<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\mc;
use App\Models\User;

class mcController extends Controller
{

	public function index()
    {
        $data_mc=mc::all();
        $kategori = DB::table('kategori_mkns')->get();
    	$data= User::where('level','mc')->get();
    	return view('detailpaket.mc',['data_mc' => $data_mc, 'kategori'=>$kategori,'data'=>$data]);
    }

    public function create(Request $request)
    {
        $id_mc = 'mc-'.rand();
        $mc = new mc;
        $mc->id_mc=$id_mc;
        $mc->nama_mc=$request->nama;
        $mc->paket_mc=$request->paket;
        $mc->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$mc= mc::find($id);
    	$mc->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$mc= mc::find($id);
    	$mc->delete($mc);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
