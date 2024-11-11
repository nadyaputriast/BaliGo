<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan untuk {{ $destinasi->nama_destinasi }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>Ulasan untuk {{ $destinasi->nama_destinasi }}</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan daftar ulasan -->
    @include('features.list_ulasan', ['ulasan' => $ulasan])

    <!-- Form tambah ulasan -->
    @auth
    <form action="{{ route('ulasan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id_destinasi" value="{{ $destinasi->id_destinasi }}">
        <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
        
        <div class="form-group">
            <label for="isi_ulasan">Isi Ulasan:</label>
            <textarea name="isi_ulasan" class="form-control" required></textarea>
        </div>
        
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" class="form-control" min="1" max="5" required>
        </div>
        
        <div class="form-group">
            <label for="foto_ulasan">Foto Ulasan:</label>
            <input type="file" name="foto_ulasan" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Kirim Ulasan</button>
    </form>
    @else
    <p>Silakan <a href="{{ route('login.form') }}">login</a> untuk menulis ulasan.</p>
    @endauth

    <a href="{{ route('features.detail_destinasi', $destinasi->id_destinasi) }}" class="btn btn-secondary mt-3">Kembali ke Detail Destinasi</a>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>