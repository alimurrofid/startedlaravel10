<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HalamanController extends Controller
{
    function index()
    {
        return view('halaman/index');
    }
    function tentang()
    {
        return view('halaman/tentang');
    }
    function kontak()
    {
        
        $data = [
            'judul' => 'Ini adalah halaman kontak',
            'kontak' => [
                'email' => 'alimurrofid77@gmail.com',
                'youtube' => 'alimurrofid youtube',
            ]
            ];
        return view('halaman/kontak')->with( $data);
    }
}
