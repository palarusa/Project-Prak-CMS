@extends('layouts.app')

@section('title', 'Tambah Penyewaan')

@section('content')
<h2 class="mb-4">Tambah Penyewaan Baru</h2>
<form method="POST" action="{{ route('penyewaan.store') }}">
    @csrf
    <div class="mb-3">
        <label for="id_pelanggan" class="form-label">Pelanggan</label>
        <select name="id_pelanggan" class="form-select" required>
            @foreach($pelanggan as $p)
                <option value="{{ $p->id }}">{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_sepedamotor" class="form-label">Sepeda Motor</label>
        <select name="id_sepedamotor" class="form-select" required>
            @foreach($motor as $m)
                <option value="{{ $m->id }}">{{ $m->merek }} - {{ $m->plat_nomor }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_petugas" class="form-label">Petugas</label>
        <select name="id_petugas" class="form-select" required>
            @foreach($petugas as $t)
                <option value="{{ $t->id }}">{{ $t->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
        <input type="date" name="tgl_sewa" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="lama_sewa" class="form-label">Lama Sewa (hari)</label>
        <input type="number" name="lama_sewa" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('penyewaan.index') }}" class="btn btn-secondary">← Kembali</a>
</form>
@endsection