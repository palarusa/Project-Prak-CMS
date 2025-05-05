@extends('layouts.app')

@section('title', 'Edit pelanggan')

@section('content')
    <h1>Edit Pelanggan</h1>

    <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}">
        @csrf
        @method('PUT')

        <label>Nama:</label><br>
        <input type="text" name="nama" value="{{ $pelanggan->nama }}"><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="no_telepon" value="{{ $pelanggan->no_telepon }}"><br><br>

        <label>Alamat:</label><br>
        <input type="text" name="alamat" value="{{ $pelanggan->alamat }}"><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="{{ $pelanggan->email }}"><br>

        <button style="margin-top: 10px;">Simpan</button>
    </form>

    <br>
    <a href="{{ route('pelanggan.show', $pelanggan->id) }}">← Kembali ke detail</a>
@endsection