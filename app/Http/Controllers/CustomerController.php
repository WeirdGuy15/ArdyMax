<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use Auth;
use DB;
use App\Models\Customer;
use App\Models\Devisi;

class CustomerController extends Controller
{
    public function index()
    {
    	$data_customer= Customer::all();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('menuadmin.customer',['data_customer' => $data_customer, 'kategori'=>$kategori,]);
    }

    public function update(Request $request,$id)
    {
    	$customer= Customer::find($id);
        $form_data = array(
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
        );
        Customer::whereId($request->id)->update($form_data);
        
        return redirect()->back()->with('update','Berhasil Update');
    }

    public function delete($id)
    {
    	$customers= Customer::find($id);
    	$customers->delete($customers);
    	return redirect()->back()->with('delete','Berhasil Dihapus');
    }

    
}
