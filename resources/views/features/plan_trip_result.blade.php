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

        <h3>Kabupaten/Kota yang Dipilih: {{ implode(', ', $kabupatenKota) }}</h3>
        <h3>Destinasi yang Dipilih:</h3>

        <form method="GET" action="{{ route('features.plan_trip_result') }}" class="mb-4">
            <input type="hidden" name="budget" value="{{ $budget }}">
            <input type="hidden" name="jumlah_destinasi" value="{{ $jumlahDestinasi }}">
            <input type="hidden" name="kabupaten_kota" value="{{ json_encode($kabupatenKota) }}">
            <div class="input-group">
                <label for="per_page" class="form-label">Tampilkan: </label>
                <select name="per_page" id="per_page" class="form-select" onchange="this.form.submit()">
                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                    <option value="25" {{ $perPage == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50</option>
                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100</option>
                </select>
            </div>
        </form>

        @if ($paginatedResults->isNotEmpty())
            @foreach ($paginatedResults as $index => $kombinasi)
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Kombinasi Destinasi {{ $index + 1 }}</h4>
                        <div class="row">
                            @foreach ($kombinasi as $dw)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        @if ($dw->foto_destinasi)
                                            <img src="{{ asset('storage/' . $dw->foto_destinasi) }}"
                                                class="card-img-top" alt="Gambar Destinasi">
                                        @else
                                            <img src="https://via.placeholder.com/150" class="card-img-top"
                                                alt="Tidak ada gambar">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $dw->nama_destinasi }}</h5>
                                            <p class="card-text">Harga Tiket: {{ $dw->harga_tiket }}</p>
                                            <p class="card-text">Rating: {{ $dw->rating_destinasi }}</p>
                                            <a href="{{ route('features.detail_destinasi', ['id' => $dw->id_destinasi]) }}"
                                                class="btn btn-primary">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            {{ $paginatedResults->links() }}
        @else
            <p>Tidak ada destinasi yang sesuai dengan budget dan pilihan kabupaten/kota.</p>
        @endif
        <a href="{{ route('features.plan_trip_form') }}" class="btn btn-primary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
