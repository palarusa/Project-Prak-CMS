@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Petugas Baru</h2>

    <form method="POST" action="{{ route('petugas.store') }}" style="line-height: 2;">
        @csrf
        <label>Nama: <input type="text" name="nama" required></label><br>
        <label>Nomor Telepon: <input type="text" name="no_telepon" required></label><br>
        <label>Alamat: <input type="text" name="alamat" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('petugas.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection

