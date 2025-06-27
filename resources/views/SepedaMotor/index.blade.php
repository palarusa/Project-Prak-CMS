@extends('layouts.app')

@section('title', 'Daftar Sepeda Motor')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Sepeda Motor</h2>
        <a href="{{ route('sepedamotor.create') }}" class="btn btn-primary">+ Tambah Motor</a>
    </div>

    @if($sepedamotor->isEmpty())
        <div class="alert alert-info">Tidak ada data sepeda motor.</div>
    @else
        <ul class="list-group">
            @foreach($sepedamotor as $m)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('sepedamotor.show', $m->id) }}" class="text-decoration-none">
                        {{ $m->merek }} ({{ $m->plat_nomor }})
                    </a>
                    <span class="badge bg-secondary">Status: {{ $m->status }}</span>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection