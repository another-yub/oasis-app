<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginController extends Controller
{
    public function showlogin(){
        return view('app.login.login');
    }

    public function login(Request $request)
    {
        $masuk = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($masuk)){
            $request->session()->regenerate();

            if(auth()->user()->role == "siswa"){
                return redirect('/pemilihan');
            }

            return redirect()->intended('/')->with(['successlogin' => 'Autentikasi login Berhasil']);
        }
        return back()->with(['error' => 'Login gagal email / password salah']);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with(['success' => 'Anda berhasil logout :)']);
    }
}
