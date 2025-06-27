@extends('layouts.app')

@section('title', 'Detail Pembayaran')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">📋 Detail Pembayaran</h3>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Penyewa:</strong> {{ $pembayaran->penyewaan->pelanggan->nama }}</li>
                <li class="list-group-item"><strong>Tanggal Bayar:</strong> {{ $pembayaran->tgl_bayar }}</li>
                <li class="list-group-item"><strong>Jumlah Bayar:</strong> Rp{{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</li>
                <li class="list-group-item"><strong>Metode:</strong> {{ $pembayaran->metode }}</li>
                <li class="list-group-item"><strong>Petugas:</strong> {{ $pembayaran->petugas->nama }}</li>
            </ul>

            <div class="d-flex gap-2 mb-3">
                <a href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-warning">✏ Edit</a>
                <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pembayaran ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                </form>
            </div>

            <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection