<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function postLogin(Request $request)
    {
        // dd($request->all());
        $request->validate([ 
            'username' => 'required', 
            'password' => 'required'
        ]); 
 
        if(Auth::attempt($request->only('username', 'password'))){ 
            return redirect('daftarEmployee'); 
        } 
 
        return back()->withInput()->withErrors([ 
            'login' => 'wrong login' 
        ]); 
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
