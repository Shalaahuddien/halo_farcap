<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //

    function login(Request $request)
    {
        $email = $request->input('email');
        $email = $request->input('password');
        $pengguna = Pengguna::query()
        ->where('email', $email)
        ->first();
        if ($pengguna == null) {
            return redirect()
            ->withErrors([
                "msg" => "Email tidak ditemukan!"
            ])->back();	
        }  
        if (!Hash::check($password, $pengguna->password))
        {
            return redirect()
            ->withErrors([
                "msg" => "password salah!"
            ])->back();
        }

        if(!session()->isStarted()) session()->start();
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("homepage");
    }

    
    function logout(Request $request)
    {
        
    }

}
