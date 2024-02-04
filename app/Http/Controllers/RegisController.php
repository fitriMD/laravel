<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisController extends Controller
{
    public function simpanregistrasi(Request $request){
        // User::create([
        //     'username' => $request->username,
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'remember_token' => Str::random(60),
        // ]);

        // return back()->with('success','Success! user added');

        $dataUser = array(

            'name'  => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make( $request->password ),
            'role'      => "guest"
        );
        DB::table('users')->insert($dataUser);

        // $dataPegawai = array(

        //     'nama_lengkap' => $request->name,
        //     'user_id'      => $user_id,
        //     'email'        => $request->email
        // );
        // DB::table('pegawai')->insert($dataPegawai);
        return back()->with('success','Success! user added');

    }

}
