<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    function index()
    {
        // $data = siswa::all();
        $data = siswa::orderby('nomor_induk', 'desc')->paginate(2);
        return view('siswa/index')->with('data', $data);
    }
    function detail($id)
    {
        // return "<h1>Saya SISWA dari Controller dengan ID $id</h1>";
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }
}
