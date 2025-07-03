@extends('layouts.app')

@section('title', 'Daftar Penyewaan')

@section('content')
<div class="container mt-5">
    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Penyewaan</h2>
        <a href="{{ route('penyewaan.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-lg"></i> Tambah Penyewaan
        </a>
    </div>

    {{-- Kondisi jika tidak ada data --}}
    @if ($penyewaan->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada data penyewaan.
        </div>
    @else
        {{-- Card List --}}
        <div class="card shadow-sm rounded">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Riwayat Penyewaan</h5>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($penyewaan as $p)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $p->pelanggan->nama }}</strong> menyewa
                                <td>{{ optional($p->SepedaMotor)->merek ?? '-' }}</td>

                                pada <span class="text-muted">{{ \Carbon\Carbon::parse($p->tgl_sewa)->format('d M Y') }}</span>
                                selama <strong>{{ $p->lama_sewa }} hari</strong>
                            </div>
                            <div>
                                <a href="{{ route('penyewaan.show', $p->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> Detail
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
</div>
@endsection
