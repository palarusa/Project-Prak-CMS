@extends('layouts.app')

@section('title', 'Edit Penyewaan')

@section('content')
<h2 class="mb-4">Edit Penyewaan</h2>
<form method="POST" action="{{ route('penyewaan.update', $penyewaan->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="id_pelanggan" class="form-label">Pelanggan</label>
        <select name="id_pelanggan" class="form-select" required>
            @foreach($pelanggan as $p)
                <option value="{{ $p->id }}" {{ $penyewaan->id_pelanggan == $p->id ? 'selected' : '' }}>{{ $p->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_sepedamotor" class="form-label">Sepeda Motor</label>
        <select name="id_sepedamotor" class="form-select" required>
            @foreach($motor as $m)
                <option value="{{ $m->id }}" {{ $penyewaan->id_sepedamotor == $m->id ? 'selected' : '' }}>{{ $m->merek }} - {{ $m->plat_nomor }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="id_petugas" class="form-label">Petugas</label>
        <select name="id_petugas" class="form-select" required>
            @foreach($petugas as $t)
                <option value="{{ $t->id }}" {{ $penyewaan->id_petugas == $t->id ? 'selected' : '' }}>{{ $t->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="tgl_sewa" class="form-label">Tanggal Sewa</label>
        <input type="date" name="tgl_sewa" class="form-control" value="{{ $penyewaan->tgl_sewa }}" required>
    </div>

    <div class="mb-3">
        <label for="lama_sewa" class="form-label">Lama Sewa</label>
        <input type="number" name="lama_sewa" class="form-control" value="{{ $penyewaan->lama_sewa }}" required>
    </div>

    <button type="submit" class="btn btn-success">💾 Simpan</button>
    <a href="{{ route('penyewaan.show', $penyewaan->id) }}" class="btn btn-secondary">← Kembali</a>
</form>
@endsection