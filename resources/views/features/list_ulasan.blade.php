<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>List Ulasan</title>
</head>

<body>
    <!-- resources/views/features/list_ulasan.blade.php -->
    <h2 class="mt-5">Daftar Ulasan</h2>
    @foreach ($ulasan as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $item->user->name }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $item->tanggal_ulasan }}</h6>
                <p class="card-text">{{ $item->isi_ulasan }}</p>
                <p class="card-text">Rating: {{ $item->rating }}</p>
                @if ($item->foto_ulasan)
                    <img src="{{ asset('storage/' . $item->foto_ulasan) }}" class="img-fluid" alt="Foto Ulasan">
                @else
                    <p>Tidak ada foto ulasan</p>
                @endif
            </div>
        </div>
    @endforeach
</body>
</html>