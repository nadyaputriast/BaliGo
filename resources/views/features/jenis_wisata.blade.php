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

    <title>Jenis Wisata - {{ $jenis }}</title>
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

        .btn {
            width: 120px;
            border-radius: 10px;
            background-color: #3f3f3f;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <h1>Wisata - {{ $jenis }}</h1>
    </div>
    @if ($destinasiWisata->isEmpty())
        <p>Tidak ada destinasi wisata untuk jenis wisata ini.</p>
    @else
        <div class="container my-5">
            <div class="row g-4">
                @foreach ($destinasiWisata as $dw)
                    <!-- Card 1 -->
                    <div class="col-md-4">
                        <div class="card position-relative">
                            @if ($dw->foto_destinasi)
                                <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" class="card-img-top"
                                    alt="Gambar Destinasi">
                            @else
                                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Tidak ada gambar">
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