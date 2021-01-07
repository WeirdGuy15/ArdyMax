<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\hiburan;
use App\Models\User;

class hiburanController extends Controller
{

	public function index()
    {
    	$data_hiburan=hiburan::all();
        $data=User::where('level','hiburan')->get();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('detailpaket.hiburan',['data_hiburan' => $data_hiburan, 'kategori'=>$kategori,'data'=>$data]);
    }

    public function create(Request $request)
    {
        $id_hiburan = 'hbr-' .rand();
        $hiburan = new hiburan;
        $hiburan->id_hiburan=$id_hiburan;
        $hiburan->nama_hiburan=$request->nama;
        $hiburan->paket_hiburan=$request->paket;
        $hiburan->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$hiburan= hiburan::find($id);
    	$hiburan->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$hiburan= hiburan::find($id);
    	$hiburan->delete($hiburan);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
