@extends('layouts.app')

@section('title', 'Hapus Petugas')

@section('content')
<div class="container mt-5">
    <div class="card border-danger shadow">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">Konfirmasi Hapus Petugas</h4>
        </div>
        <div class="card-body">
            <p>Apakah Anda yakin ingin menghapus petugas berikut?</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Nama:</strong> {{ $petugas->nama }}</li>
                <li class="list-group-item"><strong>No Telepon:</strong> {{ $petugas->no_telepon }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $petugas->alamat }}</li>
            </ul>

            <form action="{{ route('petugas.destroy', $petugas->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="d-flex justify-content-between">
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
