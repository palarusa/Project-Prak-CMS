@extends('layouts.app')

@section('title', 'Data Petugas')

@section('content')
    <h2>Data Petugas</h2>

    @if (session('success'))
        <div style="color:green;">{{ session('success') }}</div>
    @endif

    <a href="{{ route('petugas.create') }}">Tambah Petugas</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>No Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $p)
                <tr>
                    <td>{{ $p->nama }}</td>
                    <td>{{ $p->no_telepon }}</td>
                    <td>{{ $p->alamat }}</td>
                    <td>
                        <a href="{{ route('petugas.show', $p->id) }}">Detail</a> |
                        <a href="{{ route('petugas.edit', $p->id) }}">Edit</a> |
                        <form action="{{ route('petugas.destroy', $p->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin hapus?')" type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
