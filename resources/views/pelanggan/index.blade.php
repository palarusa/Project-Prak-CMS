@extends('layouts.app')

@section('title', 'Daftar Pelanggan')

@section('content')
<div class="container mt-5">
    <h3>Daftar Pelanggan</h3>

    <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3">+ Tambah Pelanggan</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pelanggan as $p)
            <tr>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->no_telepon }}</td>
                <td>{{ $p->alamat }}</td>
                <td>{{ $p->email }}</td>
                <td>
                    <a href="{{ route('pelanggan.show', $p->id) }}" class="btn btn-info btn-sm">Detail</a>
                    <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('pelanggan.destroy', $p->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
