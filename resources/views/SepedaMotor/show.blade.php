@extends('layouts.app')

@section('title', 'Detail Sepeda Motor')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">📋 Detail Sepeda Motor</h3>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Merek:</strong> {{ $motor->merek }}</li>
                <li class="list-group-item"><strong>Tipe:</strong> {{ $motor->tipe }}</li>
                <li class="list-group-item"><strong>Plat Nomor:</strong> {{ $motor->plat_nomor }}</li>
                <li class="list-group-item"><strong>Status:</strong> {{ $motor->status }}</li>
                <li class="list-group-item"><strong>Harga Sewa per Hari:</strong> Rp{{ number_format($motor->harga_sewa_per_hari, 0, ',', '.') }}</li>
            </ul>

            <div class="d-flex gap-2 mb-3">
                <a href="{{ route('sepedamotor.edit', $motor->id) }}" class="btn btn-warning">✏ Edit</a>
                <form action="{{ route('sepedamotor.destroy', $motor->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus sepeda motor ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                </form>
            </div>

            <a href="{{ route('sepedamotor.index') }}" class="btn btn-secondary">← Kembali ke Daftar</a>
        </div>
    </div>
</div>
@endsection