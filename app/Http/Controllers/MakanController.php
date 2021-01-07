<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Makanan;
use DB;

class MakanController extends Controller
{
    public function index()
    {
        $kategorimkn = DB::table('kategori_mkns')->get();
		$makan = DB::table('makan')->get();
    	return view('detailpaket.makanan',['kategori'=>$kategorimkn, 'data_makan'=>$makan]);
	}

    public function kategori(Request $request)
    {
        $kategorimkn = DB::table('kategori_mkns')->get();
        $makan = DB::table('makan')->where('kategori', $request->kategori)->get();
        return view('detailpaket.makanan',['kategori'=>$kategorimkn, 'data_makan'=>$makan]);
    }

     public function add(Request $request)
    {
        $id_makan = 'mkn-' .rand();
        $makan = new Makanan;
        $makan->id_makan=$id_makan;
        $makan->makan=$request->makan;
        $makan->kategori=$request->kategori;
        $makan->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$makan= Makanan::find($id);
    	$makan->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$makan= Makanan::find($id);
    	$makan->delete($makan);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
}
