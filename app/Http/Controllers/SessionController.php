<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    
    function index()
    {
        return view('sesi/index');
    }
    function login(Request $request)
    {
        Session::flash('email', $request->email);
        //proses validasi
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        //proses otentikasi
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //kalau otentikasi sukses
            return redirect('siswa')->with('success', 'Login berhasil');
        } else {
            //kalau otentikasi gagal
            return redirect('sesi')->withErrors('Email atau Password salah');
        }
    }
    
    function logout ()
    {
        Auth::logout();
        return redirect('sesi')->with('success', 'Logout berhasil');
    }
}
