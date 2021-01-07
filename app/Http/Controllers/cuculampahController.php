<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cuculampah;
use App\Models\User;
use DB;

class cuculampahController extends Controller
{
    public function index()
    {
        $data_cuculampah=cuculampah::all();
        $kategori = DB::table('kategori_mkns')->get();
    	$data=User::where('level','cuculampah')->get();
    	return view('detailpaket.cuculampah',['data_cuculampah' => $data_cuculampah, 'data'=>$data, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {

        $cuculampah = new cuculampah;
        $cuculampah->cucu_lampah=$request->cucu_lampah;
        $cuculampah->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$cuculampah= cuculampah::find($id);
    	$cuculampah->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$cuculampah= cuculampah::find($id);
    	$cuculampah->delete($cuculampah);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
}
