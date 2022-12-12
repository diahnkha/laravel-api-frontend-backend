<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    function login(Request $request){
        if ($request->method() == "GET"){
            return view("login");
        }
        //
        $email = $request->input("email");
        $password = $request->input("password");

        $pengguna = Pengguna::query()
            ->where("email", $email)
            ->first();
        if($pengguna == null){
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "Email tidak ditemukan"
                ]);
        }
        if (!Hash::check($password, $pengguna->password)){
            return redirect()
                ->back()
                ->withErrors([
                    "msg" => "password salah!"
                ]);
        }

        if(!session()->isStarted()) session()->start(); //jika si sessionnya blum di start, kita start dulu
        session()->put("logged", true);
        session()->put("idPengguna", $pengguna->id);
        return redirect()->route("homepage");

    }

    function logout(Request $request){
        session()->flush(); //hapus semua session
        return redirect()->route("login");
    }
}
