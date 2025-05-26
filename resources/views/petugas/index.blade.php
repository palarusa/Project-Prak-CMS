@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


    <h2 style="margin-bottom: 16px;">Daftar Petugas</h2>

    <table border="1" cellpadding="10" cellspacing="0">
         <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($petugas as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('petugas.show', $p->id) }}">Lihat</a> |
                        <a href="{{ route('petugas.edit', $p->id) }}">Edit</a> |
                        <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus pelanggan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Tidak ada petugas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('petugas.create') }}" style="display: inline-block; margin-top: 20px;">+ Tambah Pelanggan</a>
@endsection