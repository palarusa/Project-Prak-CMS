@extends('layouts.app')

@section('title', 'Tambah Petugas')

@section('content')
    <h2>Tambah Petugas</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('petugas.store') }}" method="POST">
        @csrf
        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama') }}" required><br>

        <label>No Telepon:</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon') }}" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="{{ old('alamat') }}" required><br>

        <button type="submit">Simpan</button>
    </form>
@endsection
