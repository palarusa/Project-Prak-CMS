@extends('layouts.app')

@section('title', 'Daftar Sepeda Motor')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Sepeda Motor</h2>
        <a href="{{ route('sepedamotor.create') }}" class="btn btn-primary">+ Tambah Motor</a>
    </div>

    @if($motor->isEmpty())
        <div class="alert alert-info">Belum ada data sepeda motor.</div>
    @else
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Merek</th>
                    <th>Tipe</th>
                    <th>Plat Nomor</th>
                    <th>Status</th>
                    <th>Harga/Hari</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($motor as $m)
                <tr>
                    <td>{{ $m->id }}</td>
                    <td>{{ $m->merek }}</td>
                    <td>{{ $m->tipe }}</td>
                    <td>{{ $m->plat_nomor }}</td>
                    <td>{{ $m->status }}</td>
                    <td>Rp{{ number_format($m->harga_sewa_per_hari, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('sepedamotor.show', $m->id) }}" class="btn btn-sm btn-info">Detail</a>
                        <a href="{{ route('sepedamotor.edit', $m->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('sepedamotor.destroy', $m->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
