<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\paket;
use Validator;
use Alert;

class paketController extends Controller
{
   		public function index(Request $request)
        {
			$data_paket= DB::table('paket')->join('rias', 'rias.id', '=', 'paket.id_rias')
						->join('hiburan', 'hiburan.id', '=', 'paket.id_hiburan')
						->join('mc', 'mc.id', '=', 'paket.id_mc')
						->join('dek', 'dek.id', '=', 'paket.id_dek')
						->join('dok', 'dok.id', '=', 'paket.id_dok')
						->select('paket.nama_paket','paket.id_paket','rias.paket_rias','hiburan.paket_hiburan','mc.paket_mc',
						'dek.paket_dek','dok.paket_dok', 'paket.id', 'paket.id_rias','paket.id_hiburan','paket.id_mc',
						'paket.id_dok','paket.id_dek')
						->get();
			$kategori = DB::table('kategori_mkns')->get();
			$rias = DB::table('rias')->get();
			$hiburan = DB::table('hiburan')->get();
			$dek = DB::table('dek')->get();
			$dok = DB::table('dok')->get();
			$mc = DB::table('mc')->get();
			return view('menuadmin.paket',['data_paket' => $data_paket, 'kategori'=>$kategori,
						'rias'=>$rias, 'dek'=>$dek,'dok'=>$dok,'mc'=>$mc,'hiburan'=>$hiburan]);
		}
		
        public function create(Request $request)
	    {
			$id_paket = "pkt-" . rand();
	        $paket = new  paket;
	        $paket->id_paket=$id_paket;
			$paket->nama_paket = $request->nama_paket;
			$paket->id_rias = $request->rias;
			$paket->id_dek = $request->dek;
			$paket->id_dok = $request->dok;
			$paket->id_mc = $request->id_mc;
			$paket->id_hiburan = $request->hiburan;
			$paket->save();
			
			Alert::success('Berhasil', 'Data Yang Anda Isi Sudah Ditambahkan');
	    	return redirect()->back();
		}
		
	    public function update(Request $request,$id)
	    {
	    	$paket= paket::find($id);
			$form_data = array(
				'nama_paket' => $request->nama_paket,
				'id_paket' => $request->id_paket,
				'id_rias' => $request->rias,
				'id_hiburan' => $request->id_hiburan,
				'id_mc' =>$request->id_mc,
				'id_dek' => $request->id_dek,
				'id_dok' => $request->id_dok,
			);

			paket::whereId($request->id)->update($form_data);

			Alert::success('Berhasil', 'Data Sudah TerUpdate');
	    	return redirect()->back()->with('sukses','Data berhasil diupdate');
	    }

	    public function delete($id)
	    {
	    	$paket= paket::find($id);
			$paket->delete($paket);
			
			Alert::success('Berhasil', 'Data Sudah Terhapus');
	    	return redirect()->back()->with('sukses','Data berhasil dihapus');
	    }

}