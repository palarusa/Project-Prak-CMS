@extends('layouts.app')

@section('title', 'Detail Pelanggan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">📋 Detail Pelanggan</h3>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Nama:</strong> {{ $pelanggan->nama }}</li>
                <li class="list-group-item"><strong>Nomor Telepon:</strong> {{ $pelanggan->no_telepon }}</li>
                <li class="list-group-item"><strong>Alamat:</strong> {{ $pelanggan->alamat }}</li>
                <li class="list-group-item"><strong>Email:</strong> {{ $pelanggan->email }}</li>
            </ul>

            <div class="d-flex gap-2 mb-3">
                <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="btn btn-warning">✏ Edit</a>

                <form action="{{ route('pelanggan.destroy', $pelanggan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                </form>
            </div>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection
