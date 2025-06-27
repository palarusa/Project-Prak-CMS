@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pembayaran</h2>
        <a href="{{ route('pembayaran.create') }}" class="btn btn-primary">+ Tambah Pembayaran</a>
    </div>

    @if($pembayaran->isEmpty())
        <div class="alert alert-info">Belum ada data pembayaran.</div>
    @else
        <ul class="list-group">
            @foreach($pembayaran as $p)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $p->penyewaan->pelanggan->nama }} - Rp{{ number_format($p->jumlah_bayar, 0, ',', '.') }} ({{ $p->tgl_bayar }})
                    <a href="{{ route('pembayaran.show', $p->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection