@extends('layout/aplikasi')
@section('konten')
<div>
    <a href="/siswa" class="btn btn-secondary btn-sm">Kembali</a>
    <H1>{{ $data->nama }}</H1>
    <p>
        <b>Nomor Induk</b><p>{{ $data->nomor_induk }}</p>
    </p>
    <p>
        <b>Alamat</b><p>{{ $data->alamat }}</p>
    </p>
</div>
@endsection