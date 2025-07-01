@extends('layouts.app')

@section('title', 'Edit Petugas')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Edit Petugas</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('petugas.update', $petugas->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" id="nama" name="nama" value="{{ old('nama', $petugas->nama) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $petugas->no_telepon) }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" id="alamat" name="alamat" value="{{ old('alamat', $petugas->alamat) }}" class="form-control" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('petugas.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
