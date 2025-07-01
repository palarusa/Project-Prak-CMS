@extends('layouts.app')

@section('title', 'Data Petugas')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Data Petugas</h2>
        <a href="{{ route('petugas.create') }}" class="btn btn-success">+ Tambah Petugas</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th class="text-center" style="width: 200px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($petugas as $p)
                        <tr>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->no_telepon }}</td>
                            <td>{{ $p->alamat }}</td>
                            <td class="text-center">
                                <a href="{{ route('petugas.show', $p->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Yakin ingin menghapus?')" type="submit" class="btn btn-sm btn-danger">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if ($petugas->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center text-muted">Belum ada data petugas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
