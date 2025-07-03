<!-- resources/views/upload.blade.php -->

<h2>Upload Gambar</h2>

@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif

<form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Judul"><br><br>
    <input type="file" name="image"><br><br>
    <button type="submit">Upload</button>
</form>

@if(isset($image))
    <hr>
    <h3>{{ $image->title }}</h3>
    <img src="{{ asset('storage/' . $image->image_path) }}" width="200"><br><br>

    <form action="{{ route('upload.destroy', $image->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('Yakin hapus gambar ini?')">Hapus</button>
    </form>
@endif
