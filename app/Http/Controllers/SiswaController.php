<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = siswa::orderby('nomor_induk', 'desc')->paginate(4);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nomor_induk.required' => 'Nomor Induk tidak boleh kosong',
            'nomor_induk.numeric' => 'Nomor Induk harus berupa angka',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong'
        ]);
        $data = [
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ];
        siswa::create($data);
        return redirect('siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/show')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
