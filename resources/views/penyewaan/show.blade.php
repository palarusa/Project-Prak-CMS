@extends('layouts.app')

@section('title', 'Detail Penyewaan')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">📋 Detail Penyewaan</h3>

            <ul class="list-group list-group-flush mb-4">
                <li class="list-group-item"><strong>Pelanggan:</strong> {{ $penyewaan->pelanggan->nama }}</li>
                <li class="list-group-item"><strong>Motor:</strong> {{ $penyewaan->SepedaMotor->merek }} - {{ $penyewaan->SepedaMotor->plat_nomor }}</li>
                <li class="list-group-item"><strong>Petugas:</strong> {{ $penyewaan->petugas->nama }}</li>
                <li class="list-group-item"><strong>Tanggal Sewa:</strong> {{ $penyewaan->tgl_sewa }}</li>
                <li class="list-group-item"><strong>Lama Sewa:</strong> {{ $penyewaan->lama_sewa }} hari</li>
                <li class="list-group-item"><strong>Total Biaya:</strong> Rp{{ number_format($penyewaan->total_biaya, 0, ',', '.') }}</li>
            </ul>

            <div class="d-flex gap-2 mb-3">
                <a href="{{ route('penyewaan.edit', $penyewaan->id) }}" class="btn btn-warning">✏ Edit</a>
                <form action="{{ route('penyewaan.destroy', $penyewaan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">🗑 Hapus</button>
                </form>
            </div>

            <a href="{{ route('penyewaan.index') }}" class="btn btn-secondary">← Kembali</a>
        </div>
    </div>
</div>
@endsection