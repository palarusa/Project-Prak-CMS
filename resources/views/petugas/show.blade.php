@extends('layouts.app')

@section('title', 'Detail Petugas')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0">Detail Petugas</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Nama</th>
                    <td>{{ $petugas->nama }}</td>
                </tr>
                <tr>
                    <th>No Telepon</th>
                    <td>{{ $petugas->no_telepon }}</td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td>{{ $petugas->alamat }}</td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Kembali</a>
                <a href="{{ route('petugas.edit', $petugas->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection
