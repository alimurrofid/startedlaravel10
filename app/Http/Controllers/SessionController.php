<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    function register()

    {
        return view('sesi/register');
    }
    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('email', $request->email);
        //proses validasi
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ],[
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password minimal 6 karakter'
        ]);

        //proses registrasi
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) 
        ];

        //memasukan data
         User::create($data);

        //proses otentikasi
        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            //kalau otentikasi sukses
            return redirect('siswa')->with('success', Auth::user()->name. 'Login berhasil');
        } else {
            //kalau otentikasi gagal
            return redirect('sesi')->withErrors('Email atau Password yang dimasukan tidak valid');
        }
    }
}
