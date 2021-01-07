<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenisrias;

class jenisriasController extends Controller
{
     public function index()
    {
        $data_jenisrias= jenisrias::all();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('detailpaket.jenisrias',['data_jenisrias' => $data_jenisrias, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {
        $jenisrias = new jenisrias;
        $jenisrias->jenis_rias=$request->jenis_rias;
        $jenisrias->save();
    	return redirect()->back()->with('sukses','Data berhasil diinput');
    }

    public function update(Request $request,$id)
    {
    	$jenisrias= jenisrias::find($id);
    	$jenisrias->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$jenisrias= jenisrias::find($id);
    	$jenisrias->delete($jenisrias);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
}
