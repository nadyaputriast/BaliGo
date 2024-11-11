<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hasil Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <form action="{{ route('features.sorting') }}" method="GET">
        <select name="sorting" class="form-select">
            <option value="alphabet">Alfabet</option>
            <option value="price">Harga</option>
            <option value="rating">Rating</option>
        </select>
        <select name="order" class="form-select">
            <option value="asc">Ascending</option>
            <option value="desc">Descending</option>
        </select>
        <button class="btn btn-primary" type="submit">Sort</button>
    </form>
    <div class="container mt-5">
        @if ($results->isEmpty())
            <p>Tidak ada hasil yang ditemukan.</p>
        @else
            <div class="row">
                @foreach ($results as $dw)
                    <div class="col-md-4 mb-4">
                        <div class="card">
                            @if ($dw->foto_destinasi)
                                <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" class="card-img-top" alt="Gambar Destinasi">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Tidak ada gambar">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $dw->nama_destinasi }}</h5>
                                <p class="card-text">Harga Tiket: {{ $dw->harga_tiket }}</p>
                                <p class="card-text">Rating: {{ $dw->rating_destinasi }}</p>
                                <a href="{{ route('features.detail_destinasi', ['id' => $dw->id_destinasi]) }}" class="btn btn-primary">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali</a>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>