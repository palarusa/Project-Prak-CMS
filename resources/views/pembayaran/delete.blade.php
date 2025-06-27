@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Pembayaran')

@section('content')
    <h1>Yakin ingin menghapus pembayaran ini?</h1>

    <p><strong>{{ $pembayaran->penyewaan->pelanggan->nama }}</strong> - {{ $pembayaran->tgl_bayar }} - Rp{{ number_format($pembayaran->jumlah_bayar, 0, ',', '.') }}</p>

    <form action="{{ route('pembayaran.destroy', $pembayaran->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('pembayaran.show', $pembayaran->id) }}">Batal</a>
@endsection