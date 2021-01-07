<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Devisi;

class DevisiController extends Controller
{

	public function index()
    {
        $data_devisi= Devisi::all();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('menuadmin.devisi',['data_devisi' => $data_devisi, 'kategori'=>$kategori]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            array(
                "nama"=>"unique:devisi,nama"
            )
        );
        if ($validator->passes()) {
            $id_devisi = "dvs-" . rand();
            $devisi = new Devisi;
            $devisi->id_devisi= $id_devisi;
            $devisi->nama=$request->nama;
            $devisi->save();
            return redirect()->back()->with('sukses','Data berhasil diinput');
        }
        else{
            return redirect()->back()->with('gagal','Data berhasil diinput');
        }
    }

    public function update(Request $request,$id)
    {
    	$devisi= Devisi::find($id);
    	$devisi->update($request->all());
    	return redirect()->back()->with('sukses','Data berhasil diupdate');
    }

    public function delete($id)
    {
    	$devisi= Devisi::find($id);
    	$devisi->delete($devisi);
    	return redirect()->back()->with('sukses','Data berhasil dihapus');
    }
    
}
