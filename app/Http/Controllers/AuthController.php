<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login ()
    {
    	return view ('login');
    }

    public function postlogin(Request $request)
    {
    	if(Auth::attempt($request->only('id_user','password'))){
    		return redirect('/dashboard');
    	}
    	return redirect()->back();
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/');
    }

}
