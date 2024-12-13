<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        html,
        body {
            overflow: hidden;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            background: linear-gradient(45deg, #AAD4F5, #203D54);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        img {
            filter: brightness(0.5);
            object-fit: cover;
        }

        .card {
            width: 100%;
            max-width: 1200px;
            background: linear-gradient(45deg, #AAD4F5, #203D54);
            box-shadow: 5px 10px 15px rgba(0, 0, 0, 0.5);
            border-radius: 2rem;
            padding: 2rem;
            display: flex;
            flex-direction: row;
            gap: 1rem;
        }

        .carousel {
            height: 100%;
            display: flex;
            align-items: center;
        }

        .carousel-item {
            height: 100%;
            object-fit: cover;
        }

        .cont {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 1rem;
        }

        .btn-bg-cst1 {
            background-color: #203D54;
            color: #fff;
            border-radius: 25px;
        }

        .btn-bg-cst1:hover {
            background: #455ede;
            color: #fff;
        }

        .text-pur {
            color: #203D54;
        }

        .img-h {
            height: 60vh;
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <!-- Menampilkan Pesan Sukses -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan Pesan Error -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('register') }}" method="POST" class="card mb-5">
            @csrf
            <div class="row w-100">
                <div id="sliderku" class="carousel slide col-lg-6 col-md-12 d-none d-lg-block" data-bs-ride="carousel"
                    data-bs-interval="1500">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-slide-to="0" data-bs-target="#sliderku" class="active"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-slide-to="1" data-bs-target="#sliderku"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-slide-to="2" data-bs-target="#sliderku"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/BaliGo/public/images/1730510145.png" alt="slide1" class="d-block w-100 img-h">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="fw-lighter">Capturing Moments,</p>
                                <p class="fw-lighter">Creeting Memories</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/BaliGo/public/images/1730514574.jpeg" alt="slide2" class="d-block w-100 img-h">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="fw-lighter">Capturing Moments,</p>
                                <p class="fw-lighter">Creeting Memories</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/BaliGo/public/images/1730510335.png" alt="slide3" class="d-block w-100 img-h">
                            <div class="carousel-caption d-none d-md-block">
                                <p class="fw-lighter">Capturing Moments,</p>
                                <p class="fw-lighter">Creeting Memories</p>
                            </div>
                        </div>
                    </div>
                </div>

                @csrf
                <div class="cont col-lg-5">
                    <span class="d-flex justify-content-between align-items-center p-3">
                        <h2>Bali<span class="text-pur">Go</span></h2>
                        <a href="{{ route('welcome') }}" class="btn btn-light opacity-50">Back To Website</a>
                    </span>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="username" name="username" required
                            placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nama_user" name="nama_user" required
                            placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="no_telepon" name="no_telepon"
                            placeholder="No Telepon">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="">Jenis Kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" name="email" required
                            placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" id="password" name="password" required
                            placeholder="Password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-bg-cst1 w-100 mb-2">Create Account</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>
</html>