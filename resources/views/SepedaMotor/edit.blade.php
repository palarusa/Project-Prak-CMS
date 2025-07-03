@extends('layouts.app')

@section('title', 'Edit Sepeda Motor')

@section('content')
<div class="container mt-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h3 class="card-title mb-4">✏ Edit Sepeda Motor</h3>

            <form method="POST" action="{{ route('sepedamotor.update', $motor->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input type="text" name="merek" id="merek" class="form-control" value="{{ $motor->merek }}" required>
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" name="tipe" id="tipe" class="form-control" value="{{ $motor->tipe }}" required>
                </div>

                <div class="mb-3">
                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                    <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" value="{{ $motor->plat_nomor }}" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Tersedia" {{ $motor->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                        <option value="Disewa" {{ $motor->status == 'Disewa' ? 'selected' : '' }}>Disewa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga_sewa_per_hari" class="form-label">Harga Sewa per Hari</label>
                    <input type="number" name="harga_sewa_per_hari" id="harga_sewa_per_hari" class="form-control" value="{{ $motor->harga_sewa_per_hari }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">💾 Simpan</button>
                    <a href="{{ route('sepedamotor.show', $motor->id) }}" class="btn btn-secondary">← Kembali ke Detail</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection