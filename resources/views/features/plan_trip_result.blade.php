<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Plan Trip Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #6B7F8E 0%, #FFFFFF 100%);
            overflow-x: hidden;
            overflow-y: auto;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: left;
            margin-bottom: 30px;
        }

        .kombinasi-title {
            margin: 20px;
            font-size: 1.5rem;
        }

        .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            min-height: 600px;
            display: flex;
            flex-direction: column;
        }

        .card-img {
            width: 100%;
            height: 600px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-img-overlay {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.7));
            color: #FFFFFF;
            padding: 20px;
            border-radius: 10px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
            line-height: 1.5;
        }

        .badge {
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-primary {
            background: #203d54;
            color: #FFFFFF;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 16px;
            display: flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary i {
            font-size: 18px;
            margin: 0;
        }

        .btn-primary:hover {
            color: #ffffff;
            text-decoration: none;
        }

        .btn-container {
            width: 100%;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-primary,
        .btn-secondary {
            padding: 5px 15px;
            font-size: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            text-align: left;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
            margin: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase">Plan Trip Result</h1>
            </div>
        </div>

        <!-- Budget and Filters -->
        <h3>Budget Maksimum: {{ $budget }}</h3>
        <h3>Kabupaten/Kota yang Dipilih: {{ implode(', ', $kabupatenKota) }}</h3>
        <h3>Destinasi yang Dipilih:</h3>

        <form method="GET" action="{{ route('features.plan_trip_result') }}" class="mb-4">
            <input type="hidden" name="budget" value="{{ $budget }}">
            <input type="hidden" name="jumlah_destinasi" value="{{ $jumlahDestinasi }}">
            <input type="hidden" name="kabupaten_kota" value="{{ json_encode($kabupatenKota) }}">
            <div class="input-group mb-3">
                <label for="per_page" class="input-group-text">Tampilkan:</label>
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
                <div class="col mb-3">
                    <div class="card">
                        <h4 class="kombinasi-title mb-3">Kombinasi Destinasi {{ $index + 1 }}</h4>
                        <div class="row">
                            @foreach ($kombinasi as $dw)
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        @if ($dw->foto_destinasi)
                                            <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" class="card-img"
                                                alt="Gambar Destinasi">
                                        @else
                                            <img src="https://via.placeholder.com/150" class="card-img"
                                                alt="Tidak ada gambar">
                                        @endif
                                        <div class="card-img-overlay d-flex flex-column justify-content-between">
                                            <div class="d-flex justify-content-end">
                                                <span class="badge bg-warning text-dark p-2">
                                                    <i class="bi bi-star-fill"></i> {{ $dw->rating_destinasi }}
                                                </span>
                                            </div>
                                            <div>
                                                <h5 class="card-title">{{ $dw->nama_destinasi }}</h5>
                                                <p class="card-text">Harga Tiket: {{ $dw->harga_tiket }}</p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('features.detail_destinasi', ['id' => $dw->id_destinasi]) }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="bi bi-arrow-right-circle"></i>
                                                    </a>
                                                </div>
                                            </div>
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
            <div class="alert alert-danger" role="alert">
                Tidak ada destinasi yang sesuai dengan budget dan pilihan kabupaten/kota.
            </div>
        @endif

        <a href="{{ route('features.plan_trip_form') }}" class="btn btn-secondary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>