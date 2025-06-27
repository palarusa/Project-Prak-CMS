@extends('layouts.app')

@section('title', 'Konfirmasi Hapus Penyewaan')

@section('content')
    <h1>Yakin ingin menghapus penyewaan ini?</h1>

    <p><strong>{{ $penyewaan->pelanggan->nama }}</strong> menyewa <strong>{{ $penyewaan->motor->merek }}</strong> pada {{ $penyewaan->tgl_sewa }} selama {{ $penyewaan->lama_sewa }} hari.</p>

    <form action="{{ route('penyewaan.destroy', $penyewaan->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>

    <a href="{{ route('penyewaan.show', $penyewaan->id) }}">Batal</a>
@endsection