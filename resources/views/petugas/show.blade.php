@extends('layouts.app')

@section('title', 'Detail Petugas')

@section('content')
    <h2>Detail Petugas</h2>

    <p><strong>Nama:</strong> {{ $petugas->nama }}</p>
    <p><strong>No Telepon:</strong> {{ $petugas->no_telepon }}</p>
    <p><strong>Alamat:</strong> {{ $petugas->alamat }}</p>

    <a href="{{ route('petugas.index') }}">Kembali</a>
@endsection
