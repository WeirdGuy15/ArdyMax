<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Hash;
use Auth;
use DB;
use Validator;
use App\Models\User;
use App\Models\Devisi;

class UserController extends Controller
{
    public function index()
    {
    	$data_user= User::all();
        $data = Devisi::all();
        $kategori = DB::table('kategori_mkns')->get();
    	return view('menuadmin.user',['data_user' => $data_user, 'kategori'=>$kategori,'data'=>$data]);
    }

    public function create(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            array(
                "username"=>"unique:user,username",
                "nama"=>"unique:user,nama"
            )
        );
        if ($validator->passes()) {
            $users = new User;
            $users->level=$request->level;
            $users->name=$request ->name;
            $users->no_telp=$request ->no_telp;
            $users->id_user=$request->id_user;
            $users->alamat=$request->alamat;
            if ($request->hasFile('gambar')) {
                $request->file('gambar')->move('images/',$request->file('gambar')->getClientOriginalName());
                $users->gambar = $request->file('gambar')->getClientOriginalName();
            }
            $users->password=bcrypt ($request->input('password'));
            $users->remember_token= Str::random(8);
            $users->api_token = Str::random(100);
            $users->save();
            return redirect()->back()->with('sukses','Data berhasil diinput');
        }
        else {
            return redirect()->back()->with('danger','Gagal Tambah');
        }
    }

    public function update(Request $request,$id)
    {
    	$user= User::find($id);
        $form_data = array(
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'id_user' => $request->id_user,
            'level' =>$request->level,
        );
        User::whereId($request->id)->update($form_data);
        
        if ($request->password != '' && $request->password != null) {
            DB::table('user')->where('id', $request->id)->update(['password' => bcrypt($request->password)]);
        }
        return redirect()->back()->with('update','Berhasil Update');
    }

    public function delete($id)
    {
    	$users= User::find($id);
    	$users->delete($users);
    	return redirect()->back()->with('delete','Berhasil Dihapus');
    }

    
}
