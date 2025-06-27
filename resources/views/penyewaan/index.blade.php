@extends('layouts.app')

@section('title', 'Daftar Penyewaan')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Penyewaan</h2>
        <a href="{{ route('penyewaan.create') }}" class="btn btn-primary">+ Tambah Penyewaan</a>
    </div>

    @if($penyewaan->isEmpty())
        <div class="alert alert-info">Belum ada data penyewaan.</div>
    @else
        <ul class="list-group">
            @foreach($penyewaan as $p)
                <li class="list-group-item">
                    <strong>{{ $p->pelanggan->nama }}</strong> menyewa <strong>{{ $p->motor->merek }}</strong> ({{ $p->tgl_sewa }}) - {{ $p->lama_sewa }} hari
                    <div class="float-end">
                        <a href="{{ route('penyewaan.show', $p->id) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </div>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection