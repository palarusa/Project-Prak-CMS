@extends('layouts.app')

@section('title', 'Edit petugas')

@section('content')
    <h1>Edit petugas</h1>

    <form method="POST" action="{{ route('petugas.update', $petugas->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $petugas->nama }}"><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="no_telepon" value="{{ $petugas->no_telepon }}"><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $petugas->alamat }}"><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('petugas.show', $petugas->id) }}">← Kembali ke detail</a>
@endsection