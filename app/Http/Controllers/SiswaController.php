<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

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
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('nama', $request->nama);
        Session::flash('alamat', $request->alamat);

        $request->validate([
            'nomor_induk' => 'required|numeric',
            'nama' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg,gif'
        ],[
            'nomor_induk.required' => 'Nomor Induk tidak boleh kosong',
            'nomor_induk.numeric' => 'Nomor Induk harus berupa angka',
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'foto.required' => 'Foto tidak boleh kosong',
            'foto.mimes' => 'Foto harus berekstensi png, jpg, jpeg, gif'
        ]);

        $foto_file = $request->file('foto');
        $foto_ekstensi = $foto_file->extension();
        $foto_nama = date('Ymdhis').".".$foto_ekstensi;
        $foto_file->move(public_path('foto'), $foto_nama);

        $data = [
            'nomor_induk' => $request->nomor_induk,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'foto' => $foto_nama
        ];
        siswa::create($data);
        return redirect('siswa')->with('success','Data berhasil ditambahkan');
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
        $data = siswa::where('nomor_induk', $id)->first();
        return view('siswa/edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required'
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong'
        ]);
        $data = [
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ];

        //proses memasukan data baru foto
        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:png,jpg,jpeg,gif'
            ],[
                'foto.mimes' => 'Foto harus berekstensi png, jpg, jpeg, gif'
            ]);
            $foto_file = $request->file('foto');
            $foto_ekstensi = $foto_file->extension();
            $foto_nama = date('Ymdhis').".".$foto_ekstensi;
            $foto_file->move(public_path('foto'), $foto_nama);
            //Sudah terupload ke direktori public/foto

            //Hapus foto lama
            $data_foto = siswa::where('nomor_induk',$id)->first();
            File::delete(public_path('foto').'/'.$data_foto->foto);

            //Update nama foto
            $data['foto'] = $foto_nama;
        }

        siswa::where('nomor_induk',$id)->update($data);
        return redirect('siswa')->with('success','Data berhasil diUpdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = siswa::where('nomor_induk',$id)->first();
        File::delete(public_path('foto').'/'.$data->foto);
        siswa::where('nomor_induk',$id)->delete();
        return redirect('siswa')->with('success','Data berhasil DiHapus');
    }
}
