@extends('layouts.app')

@section('title', 'Tambah Sepeda Motor')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Tambah Sepeda Motor Baru</h2>

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('sepedamotor.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="merek" class="form-label">Merek</label>
                    <input type="text" name="merek" id="merek" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="tipe" class="form-label">Tipe</label>
                    <input type="text" name="tipe" id="tipe" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="plat_nomor" class="form-label">Plat Nomor</label>
                    <input type="text" name="plat_nomor" id="plat_nomor" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Disewa">Disewa</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="harga_sewa_per_hari" class="form-label">Harga Sewa per Hari</label>
                    <input type="number" name="harga_sewa_per_hari" id="harga_sewa_per_hari" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="{{ route('sepedamotor.index') }}" class="btn btn-secondary ms-2">← Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
