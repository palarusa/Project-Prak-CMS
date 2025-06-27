@extends('layouts.app')

@section('title', 'Tambah Sepeda Motor')

@section('content')
    <h2 style="margin-bottom: 16px;">Tambah Sepeda Motor Baru</h2>

    <form method="POST" action="{{ route('sepedamotor.store') }}" style="line-height: 2;">
        @csrf
        <label>Merek: <input type="text" name="merek" required></label><br>
        <label>Tipe: <input type="text" name="tipe" required></label><br>
        <label>Plat Nomor: <input type="text" name="plat_nomor" required></label><br>
        <label>Status: 
            <select name="status" required>
                <option value="Tersedia">Tersedia</option>
                <option value="Disewa">Disewa</option>
            </select>
        </label><br>
        <label>Harga Sewa per Hari: <input type="number" name="harga_sewa_per_hari" required></label><br>
        <button type="submit" style="margin-top: 10px;">Tambah</button>
    </form>

    <a href="{{ route('sepedamotor.index') }}" style="display: inline-block; margin-top: 20px;">← Kembali ke daftar</a>
@endsection