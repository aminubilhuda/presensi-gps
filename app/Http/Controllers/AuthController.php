<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function prosesLogin(Request $request) {
        if(Auth::guard('karyawan')->attempt(['nik' => $request->nik, 'password' => $request->password])){
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else{
            return redirect('/')->with('warning' , 'Nik / Password Salah');
        }
    }

    public function prosesLogout() {
        if (Auth::guard('karyawan')->check()){
            Auth::guard('karyawan')->logout();
            return redirect()->route('login');
        }
    }
}