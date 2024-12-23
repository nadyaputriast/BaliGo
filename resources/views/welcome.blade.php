<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            overflow-x: hidden;
            font-family: 'Poppins', sans-serif;
        }

        .container-fluid {
            margin: 0;
            padding: 0;
        }

        a {
            text-decoration: none;
        }

        #hero {
            background: url('/images/hero.png') no-repeat center center;
            background-size: cover;
            height: 100vh;
            position: relative;
            color: #ffffff;
            filter: brightness(0.95);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .text-pur {
            color: #203D54;
        }

        .container {
            padding: 0 15px;
        }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background: linear-gradient(135deg, #ecebeb, #ffffff, #ecebeb);
        }

        .card img {
            height: 400px;
            object-fit: cover;
            width: 100%;
        }

        .card-body {
            padding: 10px;
            text-align: center;
            flex-grow: 1;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .img-h {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .btn {
            height: 6vh;
        }

        .navbar {
            background-color: transparent;
            transition: background-color 0.3s ease;
            position: fixed;
            top: 0;

        }

        .navbar.scrolled {
            background-color: rgba(255, 255, 255, 0.9);
        }

        #navbar .navbar-nav {
            gap: 20px;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #203D54;
        }

        @media (max-width: 978px) {
            .navbar {
                background-color: #203D54;
                opacity: 0.5;
                border-radius: 25px;
            }

            .navbar-nav {
                flex-direction: column;
                align-items: center;
            }

            #navbar .navbar-nav {
                flex-direction: column;
                gap: 10px;
            }

            .img-h {
                height: 150px;
            }
        }

        .row {
            margin: 0;
        }

        .card-body {
            text-align: center;
        }

        .input-group {
            max-width: 600px;
            width: 100%;
        }

        section {
            padding: 40px 0;
        }

        h2 {
            font-size: 2rem;
        }

        header h1 {
            font-size: 2.5rem;
        }

        @media (max-width: 768px) {
            #hero {
                height: 80vh;
                /* Kurangi tinggi pada perangkat kecil */
            }

            #hero h1 {
                font-size: 2rem;
                /* Perkecil ukuran teks */
            }

            #hero p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div id="hero"
            style="background: url('{{ asset('images/hero.png') }}') no-repeat center center; background-size: cover;">
            <nav class="navbar navbar-expand-lg navbar-transparent  sticky-top" id="navbar">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse mt-5 justify-content-center" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('features.plan_trip') }}">Plan Trip</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('features.sorting') }}">Destination</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register.form') }}">Register</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login.form') }}">Login</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                            </li> --}}
                            {{-- <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <li class="nav-item">
                                    <a class="nav-link">Logout</a>
                                </li>
                            </form> --}}
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="nav-link">Logout</button>
                                </form>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.form') }}">Profile</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <header class="text-center">
                <h1 class="display-4 fw-bold">Bali<span class="text-pur">Go</span></h1>
                <p class="lead">Explore Bali's magical mix of culture, nature, and friendly locals.</p>
                <form action="{{ route('features.searching') }}" method="GET"
                    class="d-flex justify-content-center mt-3">
                    <div class="input-group">
                        <input type="text" name="keyword" class="form-control" placeholder="Cari tempat wisata...">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </form>
            </header>
        </div>

        <section>
            <h2 class="text-center text-pur">TOP DESTINATIONS BY CATEGORY</h2>
            <div class="row g-4">
                @foreach ($topDestinasi as $jenis => $destinasi)
                    @if ($destinasi)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                @if ($destinasi->foto_destinasi)
                                    <img src="{{ asset('storage/' . $destinasi->foto_destinasi) }}" class="img-h"
                                        alt="Gambar Destinasi">
                                @else
                                    <img src="https://via.placeholder.com/300x200" class="img-h"
                                        alt="Tidak ada gambar">
                                @endif
                                <div class="card-body">
                                    <h5 class="card-title">{{ $destinasi->nama_destinasi }}</h5>
                                    <p class="card-text">Wisata <a
                                            href="{{ route('features.jenis_wisata', ['jenis' => $jenis]) }}">{{ $jenis }}</a>
                                    </p>
                                    <p class="card-text">
                                        <i class="fas fa-star text-warning"></i> {{ $destinasi->rating_destinasi }}
                                    </p>
                                    <p class="card-text">Harga Tiket: {{ $destinasi->harga_tiket }}</p>
                                    <a href="{{ route('features.detail_destinasi', ['id' => $destinasi->id_destinasi]) }}"
                                        class="btn btn-secondary align-items-center d-flex justify-content-center">Lihat
                                        Detail</a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </section>

        <section>
            <h2 class="text-center text-pur">Destination Highlight</h2>
            <div class="row g-4">
                @foreach ($kabupatenList as $index => $kabupaten)
                    <div class="col-12 col-md-6 col-lg-4">
                        <!-- Bungkus seluruh card dengan <a> -->
                        <a href="{{ route('features.kabupaten', ['kabupaten_kota' => $kabupaten]) }}" 
                           class="text-decoration-none">
                            <div class="card">
                                <img src="{{ asset('images/' . ($index + 1) . '.jpeg') }}" 
                                     class="img-h h-100" 
                                     alt="Gambar Kabupaten">
                                <div class="card-body">
                                    <p class="text-pur text-center">{{ $kabupaten }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>                

        <!-- Journey Inspiration -->
        <section>
            <h2 class="mb-4 text-center text-pur">JOURNEY INSPIRATION</h2>
            <div class="row g-4 d-flex justify-content-center">
                <div class="col-9">
                    <h4 class="mb-6">Most Affordable</h4>
                    @if ($mostAffordable)
                        <div class="card d-flex flex-row p-4 card-inspiration">
                            <img src="{{ asset('storage/' . $mostAffordable->foto_destinasi) }}"
                                class="card-img-top w-50" alt="Gambar Destinasi">
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                <h5 class="card-title">{{ $mostAffordable->nama_destinasi }}</h5>
                                <p class="card-text">Harga Tiket: {{ $mostAffordable->harga_tiket }}</p>
                                <p class="card-text">
                                    <i class="fas fa-star text-warning"></i> {{ $mostAffordable->rating_destinasi }}
                                </p>
                                <a href="{{ route('features.detail_destinasi', ['id' => $mostAffordable->id_destinasi]) }}"
                                    class="btn btn-secondary d-flex align-items-center justify-content-center">Lihat Detail</a>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-9">
                    <h4 class="mt-5">Most Popular</h4>
                    @if ($mostPopular)
                        <div class="card d-flex flex-row p-4 card-inspiration">
                            <img src="{{ asset('storage/' . $mostPopular->foto_destinasi) }}"
                                class="card-img-top w-50" alt="Gambar Destinasi">
                            <div
                                class="card-body d-flex flex-column justify-content-center align-items-center text-center">
                                <h5 class="card-title">{{ $mostPopular->nama_destinasi }}</h5>
                                <p class="card-text">Harga Tiket: {{ $mostPopular->harga_tiket }}</p>
                                <p class="card-text">
                                    <i class="fas fa-star text-warning"></i> {{ $mostPopular->rating_destinasi }}
                                </p>
                                <a href="{{ route('features.detail_destinasi', ['id' => $mostPopular->id_destinasi]) }}"
                                    class="btn btn-secondary d-flex align-items-center justify-content-center">Lihat Detail</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>

    </div>
    <script>
        window.addEventListener("scroll", function() {
            const navbar = document.getElementById("navbar");
            navbar.classList.toggle("scrolled", window.scrollY > 50);
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
