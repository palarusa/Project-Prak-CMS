@extends('layouts.app')

@section('title', 'Detail petugas')

@section('content')
    <h2>Detail petugas</h2>

    <p><strong>Nama:</strong> {{ $petugas->nama }}</p>
    <p><strong>Nomor Telepon:</strong> {{ $petugas->no_telepon }}</p>
    <p><strong>Alamat:</strong> {{ $petugas->alamat }}</p>

    <br>

    <a href="{{ route('petugas.edit', $petugas->id) }}">✏ Edit</a> |
    <a href="{{ route('petugas.delete', $petugas->id) }}">🗑 Hapus</a>

    <br><br>

    <a href="{{ route('petugas.index') }}">← Kembali ke daftar</a>
@endsection