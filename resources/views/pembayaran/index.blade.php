@extends('layouts.app')

@section('title', 'Daftar Pembayaran')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center rounded-top-4">
            <h4 class="mb-0"><i class="bi bi-cash-stack me-2"></i>Daftar Pembayaran</h4>
            <a href="{{ route('pembayaran.create') }}" class="btn btn-light text-primary fw-bold shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Tambah Pembayaran
            </a>
        </div>
        <div class="card-body">
            @if($pembayaran->isEmpty())
                <div class="alert alert-info text-center mb-0">Belum ada data pembayaran.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>No</th>
                                <th>Pelanggan</th>
                                <th>Jumlah Bayar</th>
                                <th>Tanggal Bayar</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $i => $p)
                            <tr>
                                <td class="text-center">{{ $i + 1 }}</td>
                                <td>{{ $p->penyewaan->pelanggan->nama ?? '-' }}</td>
                                <td>Rp{{ number_format($p->jumlah_bayar, 0, ',', '.') }}</td>
                                <td>{{ $p->tgl_bayar }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pembayaran.show', $p->id) }}" class="btn btn-info btn-sm me-1">
                                        <i class="bi bi-eye"></i> Detail
                                    </a>
                                    <a href="{{ route('pembayaran.edit', $p->id) }}" class="btn btn-warning btn-sm me-1">
                                        <i class="bi bi-pencil-square"></i> Edit
                                    </a>
                                    <form action="{{ route('pembayaran.destroy', $p->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus pembayaran ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection