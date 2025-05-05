@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus petugas ini?</h1>

    <p><strong>{{ $petugas->nama }}</strong></p>

    <form action="{{ route('petugas.destroy', $petugas->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('petugas.show', $petugas->id) }}">Batal</a>
@endsection