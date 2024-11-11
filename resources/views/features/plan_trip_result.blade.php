<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Trip Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Plan Trip Result</h1>
        <h3>Budget Maksimum: {{ $budget }}</h3>
        <h3>Kabupaten/Kota yang Dipilih:</h3>
        <ul>
            @foreach ($kabupatenKota as $kabupaten)
                <li>{{ $kabupaten }}</li>
            @endforeach
        </ul>
        <h3>Destinasi yang Dipilih:</h3>
        @if ($hasil)
            @foreach ($hasil as $kombinasi)
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Kombinasi Destinasi</h4>
                        <div class="row">
                            @foreach ($kombinasi as $dw)
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
                    </div>
                </div>
            @endforeach
        @else
            <p>Tidak ada destinasi yang sesuai dengan budget dan pilihan kabupaten/kota.</p>
        @endif
        <a href="{{ route('features.plan_trip_form') }}" class="btn btn-primary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>