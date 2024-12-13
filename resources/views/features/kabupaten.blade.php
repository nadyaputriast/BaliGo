<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Destinasi di {{ $kabupaten_kota }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 422px;
            height: 400px;
        }

        .card img {
            height: 300px;
            object-fit: cover;
        }

        .badge-category {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #E7FFFE;
            color: #145239;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .card-body-size {
            width: 422px;
            height: 150px;
        }

        .rating {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(98, 98, 98, 0.9);
            color: #f6f6f6;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 20px;
            display: flex;
            align-items: center;
        }

        .rating i {
            margin-right: 5px;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .card-text {
            color: #666;
            font-size: 0.9rem;
        }

        .btn-details {
            position: absolute;
            bottom: 10px;
            right: 10px;
            background-color: rgba(169, 169, 169, 0.9);
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown-menu {
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            background-color: #cccccc;
            color: #333;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .dropdown-menu label {
            margin-left: 10px;
            font-weight: normal;
        }

        .dropdown-divider {
            margin: 10px 0;
        }

        .btn {
            width: 120px;
            border-radius: 10px;
            background-color: #3f3f3f;
        }

        .dropdown-text-color {
            color: #203D54;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1>Destinasi di {{ $kabupaten_kota }}</h1>
        <form action="{{ route('features.sortKab') }}" method="GET" class="mb-4">
            <div class="input-group">
                <div class="d-flex align-items-center gap-3" style="padding: 10px; border-radius: 8px;">
                    <!-- Sort Options Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="sortDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="font-size: 16px; background-color: #3f3f3f; border: none;">
                            <i class="bi bi-arrow-down-up"></i> Sort
                        </button>
                        <ul class="dropdown-menu dropdown-text-color" aria-labelledby="sortDropdown"
                            style="background-color: #e2e2e2; border-radius: 8px;">
                            <div class="dropdown-divider"></div>
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" name="sorting" value="nama_destinasi" class="me-2"> Nama
                                </label>
                            </li>
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" name="sorting" value="harga_tiket" class="me-2"> Harga Tiket
                                </label>
                            </li>
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" name="sorting" value="rating_destinasi" class="me-2"> Rating
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Order Options Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="orderDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false"
                            style="font-size: 16px; background-color: #3f3f3f; border: none;">
                            <i class="bi bi-arrow-down-up"></i> Order
                        </button>
                        <ul class="dropdown-menu dropdown-text-color" aria-labelledby="orderDropdown"
                            style="background-color: #e2e2e2; border-radius: 8px;">
                            <div class="dropdown-divider"></div>
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" name="order" value="asc" class="me-2"> Ascending
                                </label>
                            </li>
                            <li>
                                <label class="dropdown-item">
                                    <input type="radio" name="order" value="desc" class="me-2"> Descending
                                </label>
                            </li>
                        </ul>
                    </div>

                    <!-- Apply Button -->
                    <button class="btn btn-primary" type="submit" style="border-radius: 8px; padding: 6px 12px;">
                        Apply Now
                    </button>

                    <!-- Hidden Input -->
                    <input type="hidden" name="kabupaten_kota" value="{{ $kabupaten_kota }}">
                </div>
            </div>
        </form>
    </div>
    @if ($destinasiWisata->isEmpty())
        <h4 class="text-center mt-4 mx-auto" style="max-width: 600px;">Tidak ada destinasi wisata di kabupaten/kota ini.
        </h4>
    @else
        <div class="container my-5">
            <div class="row g-4">
                @foreach ($destinasiWisata as $dw)
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card position-relative">
                            @if ($dw->foto_destinasi)
                                <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" alt="Gambar Destinasi">
                            @else
                                <img src="https://via.placeholder.com/150" alt="Tidak ada gambar">
                            @endif
                            <span class="rating"><i class="bi bi-star-fill"
                                    style="color: yellow"></i>{{ $dw->rating_destinasi }}</span>
                            <div class="card-body card-body-size">
                                <h5 class="card-title">{{ $dw->nama_destinasi }}</h5>
                                <p class="card-text">{{ $dw->harga_tiket }}</p>
                                <a href="{{ route('features.detail_destinasi', ['id' => $dw->id_destinasi]) }}"
                                    class="btn-details"><i class="bi bi-chevron-right" style="font-size: 25px"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
    <div class="container mt-5">
        <a href="{{ route('welcome') }}" class="btn btn-primary mb-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>