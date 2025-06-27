@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')
    <h2>Edit Petugas</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nama:</label>
        <input type="text" name="nama" value="{{ old('nama', $petugas->nama) }}" required><br>

        <label>No Telepon:</label>
        <input type="text" name="no_telepon" value="{{ old('no_telepon', $petugas->no_telepon) }}" required><br>

        <label>Alamat:</label>
        <input type="text" name="alamat" value="{{ old('alamat', $petugas->alamat) }}" required><br>

        <button type="submit">Update</button>
    </form>
@endsection
