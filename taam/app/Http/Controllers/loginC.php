<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginC extends Controller
{
    public function index()
    {
        return view('login',[
            'title' => 'administratorTaam'
        ]);
    }

    public function store(Request $request)
    {
        $valiDate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::Attempt($valiDate)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login gagal coba cek email dan password anda');
    }

    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/');

        
    }
}
