@extends('layouts.app')

@section('title', 'Tambah Pembayaran')

@section('content')
<h2 class="mb-4">Tambah Pembayaran Baru</h2>
<form method="POST" action="{{ route('pembayaran.store') }}">
    @csrf

    <div class="mb-3">
        <label for="id_sewa" class="form-label">Pilih Penyewaan</label>
        <select name="id_sewa" class="form-select" required>
            @foreach($penyewaan as $s)
                <option value="{{ $s->id }}">{{ $s->pelanggan->nama }} - {{ $s->tgl_sewa }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
        <input type="date" name="tgl_bayar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="metode" class="form-label">Metode</label>
        <input type="text" name="metode" class="form-control" placeholder="Cash / Transfer" required>
    </div>

    <div class="mb-3">
        <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
        <input type="number" name="jumlah_bayar" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="id_petugas" class="form-label">Petugas</label>
        <select name="id_petugas" class="form-select" required>
            @foreach($petugas as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">← Kembali</a>
</form>
@endsection