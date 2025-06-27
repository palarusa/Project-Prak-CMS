@extends('layouts.app')

@section('title', 'Tambah Pelanggan')

@section('content')
<div class="container mt-5">
    <h3 class="mb-4">Tambah Pelanggan</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pelanggan.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required value="{{ old('nama') }}">
        </div>

        <div class="mb-3">
            <label for="no_telepon" class="form-label">No Telepon</label>
            <input type="text" name="no_telepon" class="form-control" required value="{{ old('no_telepon') }}">
        </div>

        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
