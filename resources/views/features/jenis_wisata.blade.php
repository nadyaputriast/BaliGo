<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jenis Wisata - {{ $jenis }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Wisata - {{ $jenis }}</h1>
        <a href="{{ route('welcome') }}" class="btn btn-primary mb-3">Kembali</a>

        @if ($destinasiWisata->isEmpty())
            <p>Tidak ada destinasi wisata untuk jenis wisata ini.</p>
        @else
            <div class="row">
                @foreach ($destinasiWisata as $dw)
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
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>