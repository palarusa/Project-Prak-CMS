@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
<h2 class="mb-4">Edit Pembayaran</h2>
<form method="POST" action="{{ route('pembayaran.update', $pembayaran->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="id_sewa" class="form-label">Pilih Penyewaan</label>
        <select name="id_sewa" class="form-select" required>
            @foreach($penyewaan as $s)
                <option value="{{ $s->id }}" {{ $pembayaran->id_sewa == $s->id ? 'selected' : '' }}>{{ $s->pelanggan->nama }} - {{ $s->tgl_sewa }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" value="{{ $pembayaran->tgl_bayar }}" required>
    </div>

    <div class="mb-3">
        <label for="metode" class="form-label">Metode</label>
        <input type="text" name="metode" class="form-control" value="{{ $pembayaran->metode }}" required>
    </div>

    <div class="mb-3">
        <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" value="{{ $pembayaran->jumlah_bayar }}" required>
    </div>

    <div class="mb-3">
        <label for="id_petugas" class="form-label">Petugas</label>
        <select name="id_petugas" class="form-select" required>
            @foreach($petugas as $p)
                <option value="{{ $p->id }}" {{ $pembayaran->id_petugas == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('pembayaran.show', $pembayaran->id) }}" class="btn btn-secondary">← Kembali</a>
</form>
@endsection