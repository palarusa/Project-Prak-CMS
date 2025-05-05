@extends('layouts.app')

@section('title', 'Daftar petugas')

@section('content')
    <h1>Daftar Petugas</h1>

    <ul>
        @forelse($petugas as $p)
            <li>
                <a href="/petugas/{{ $p['id'] }}">{{ $p['nama'] }}</a>
            </li>
        @empty
            <p>Tidak ada petugas.</p>
        @endforelse
    </ul>

    <a href="/petugas/create" style="display: inline-block; margin-top: 20px;">+ Tambah petugas</a>
    <br><br>
@endsection