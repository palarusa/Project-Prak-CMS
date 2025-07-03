@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ isset($pembayaran) ? 'Edit Pembayaran' : 'Tambah Pembayaran' }}</h1>
    <form action="{{ isset($pembayaran) ? route('pembayaran.update', $pembayaran->id) : route('pembayaran.store') }}" method="POST">
        @csrf
        @isset($pembayaran) @method('PUT') @endisset

        <!-- Penyewaan -->
        <div class="mb-3">
            <label for="id_sewa" class="form-label">Penyewaan</label>
            <select name="id_sewa" id="id_sewa" class="form-control">
                @foreach($penyewaan as $sewa)
                    <option value="{{ $sewa->id }}" {{ (old('id_sewa', $pembayaran->id_sewa ?? '') == $sewa->id) ? 'selected' : '' }}>
                        {{ $sewa->deskripsi }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Bayar -->
        <div class="mb-3">
            <label for="tgl_bayar" class="form-label">Tanggal Bayar</label>
            <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control" value="{{ old('tgl_bayar', $pembayaran->tgl_bayar ?? '') }}" required>
        </div>

        <!-- Metode -->
        <div class="mb-3">
            <label for="metode" class="form-label">Metode</label>
            <input type="text" name="metode" id="metode" class="form-control" value="{{ old('metode', $pembayaran->metode ?? '') }}" required>
        </div>

        <!-- Jumlah Bayar -->
        <div class="mb-3">
            <label for="jumlah_bayar" class="form-label">Jumlah Bayar</label>
            <input type="number"
                   name="jumlah_bayar"
                   id="jumlah_bayar"
                   class="form-control @error('jumlah_bayar') is-invalid @enderror"
                   min="1000"
                   step="1000"
                   onwheel="this.blur()"
                   value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar ?? '') }}"
                   required>
            @error('jumlah_bayar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Petugas -->
        <div class="mb-3">
            <label for="id_petugas" class="form-label">Petugas</label>
            <select name="id_petugas" id="id_petugas" class="form-control">
                @foreach($petugas as $p)
                    <option value="{{ $p->id }}" {{ (old('id_petugas', $pembayaran->id_petugas ?? '') == $p->id) ? 'selected' : '' }}>
                        {{ $p->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($pembayaran) ? 'Update' : 'Simpan' }}</button>
        <a href="{{ route('pembayaran.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
