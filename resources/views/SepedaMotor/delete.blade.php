@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus sepeda motor ini?</h1>
    <p><strong>{{ $sepedamotor->merek }} - {{ $sepedamotor->plat_nomor }}</strong></p>
    <form action="{{ route('sepedamotor.destroy', $sepedamotor->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button style="margin-right: 10px;">Ya, hapus</button>
    </form>
    <a href="{{ route('sepedamotor.show', $sepedamotor->id) }}">Batal</a>
@endsection