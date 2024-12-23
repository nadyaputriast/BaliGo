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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Detail Destinasi</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 15px;
        }

        h2 {
            color: #203D54;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card-image {
            position: relative;
            height: 500px;
            border-radius: 12px;
            overflow: hidden;
            /* Memastikan gambar tidak keluar dari container */
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Menutupi seluruh area container tanpa white space */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 12px;
        }

        .content {
            position: absolute;
            bottom: 20px;
            left: 20px;
            color: #fff;
            z-index: 2;
        }

        .rating {
            display: flex;
            align-items: center;
            margin-top: 10px;
            font-size: 1.2rem;
        }

        .tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: rgba(255, 255, 255, 0.8);
            color: #333;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
        }

        .bottom-box {
            background-color: #1d3557;
            color: white;
            padding: 25px;
            border-radius: 12px;
            margin-top: 15px;
            font-size: 1.2rem;
        }

        .bottom-box span {
            font-weight: bold;
        }

        .btn {
            width: 200px;
            border-radius: 10px;
        }

        .container {
            margin-bottom: 20px;
            max-width: 1200px;
        }

        @media (max-width: 1024px) {
            .card-image {
                height: 400px;
            }

            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.3rem;
            }

            .bottom-box {
                font-size: 1rem;
            }

            .btn {
                width: 180px;
            }
        }

        @media (max-width: 768px) {
            .card-image {
                height: 300px;
            }

            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.2rem;
            }

            .bottom-box {
                font-size: 0.9rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <!-- Main Card Section -->
    <div class="container mt-5">
        <div class="card-image">
            @if ($destinasiWisata->foto_destinasi)
                <img src="{{ asset('storage/' . $destinasiWisata->foto_destinasi) }}" alt="Gambar Destinasi">
            @else
                <img src="https://via.placeholder.com/150" alt="Tidak ada gambar">
            @endif
            <div class="overlay"></div>
            <div class="content">
                <h1>{{ $destinasiWisata->nama_destinasi }}</h1>
                <div class="rating">
                    <span>{{ $destinasiWisata->rating_destinasi }}</span>
                    <i class="text-warning bi bi-star-fill"></i>
                </div>
            </div>
            <div class="tag">{{ $destinasiWisata->jenis_wisata }}</div>
        </div>
    </div>

    <!-- Blue Box Section -->
    <div class="container bottom-box">
        <div><span>Open:</span> {{ $destinasiWisata->jam_buka }} - {{ $destinasiWisata->jam_tutup }}</div>
        <div><span>Contact:</span> {{ $destinasiWisata->contact_person }}</div>
        <div><span>Location:</span> {{ $destinasiWisata->kabupaten_kota }}</div>
    </div>

    <!-- Additional Details -->
    <div class="container">
        <p><i class="bi bi-wallet me-2"></i>Start at <strong>Rp {{ $destinasiWisata->harga_tiket }}</strong>/person</p>
        <p><i class="bi bi-telephone me-2"></i>Reservasi: <a href="https://wa.me/{{ $destinasiWisata->reservasi }}"
                target="_blank">Reservasi di Sini!</a></p>
        <p><i class="bi bi-geo-alt me-2"></i>Alamat: {{ $destinasiWisata->alamat_lengkap }}</p>
        <p><i class="bi bi-globe me-2"></i>Google Maps: <a href="{{ $destinasiWisata->link_maps }}"
                target="_blank">{{ $destinasiWisata->alamat_lengkap }}</a></p>
        <p><i class="bi bi-phone me-2"></i>Media Sosial:
            @if ($destinasiWisata->website_medsos && $destinasiWisata->website_medsos->isNotEmpty())
                <ul>
                    @foreach ($destinasiWisata->website_medsos as $website_medsos)
                        <li><a href="{{ $website_medsos->website_medsos }}"
                                target="_blank">{{ $website_medsos->website_medsos }}</a></li>
                    @endforeach
                </ul>
            @else
                Tidak ada media sosial
            @endif
        </p>
    </div>

    <!-- Facility Section -->
    <h2 class="container">Facilities</h2>
    <div class="container">
        @if ($destinasiWisata->fasilitas && $destinasiWisata->fasilitas->isNotEmpty())
            <ul>
                @foreach ($destinasiWisata->fasilitas as $fasilitas)
                    <li>{{ $fasilitas->fasilitas }}</li>
                @endforeach
            </ul>
        @else
            Tidak ada fasilitas
        @endif
    </div>

    <!-- Buttons Section -->
    <div class="container d-flex justify-content-between">
        <a href="{{ route('ulasan.show', $destinasiWisata->id_destinasi) }}" class="btn btn-secondary">Lihat Ulasan</a>
        <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>