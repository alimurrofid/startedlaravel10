@extends('layout/aplikasi')
@section('konten')
<form method="POST" action="/siswa">
    @csrf
    <div class="mb-3">
      <label for="nomor_induk" class="form-label">Nomor Induk</label>
      <input type="text" class="form-control" name="nomor_induk" id="nomor_induk">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
      <input type="text" class="form-control" name="nama" id="nama">
    </div>
    <div class="mb-3">
      <label for="alamat" class="form-label">Alamat</label>
      <textarea class="form-control" name="alamat"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">SIMPAN</button>
  </form>
    
@endsection