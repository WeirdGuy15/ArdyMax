<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Tenda;
use App\Models\User;

class TendaController extends Controller
{
    public function index()
    {
    	$data_tenda= Tenda::all();
        $data= User::where('level','tenda')->get();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('detailpaket.tenda',['data_tenda' => $data_tenda,'data'=>$data, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {
        $id_tenda = 'tnd-' .rand();
        $tenda = new Tenda;
        $tenda->id_tenda=$id_Tenda;
        $tenda->nama_tenda=$request->nama;
        $tenda->paket_tenda=$request->paket;
        $tenda->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$Tenda= Tenda::find($id);
    	$Tenda->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$Tenda= Tenda::find($id);
    	$Tenda->delete($Tenda);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
}
