<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Ulasan untuk {{ $destinasi->nama_destinasi }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFFFF;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: left;
            margin-bottom: 30px;
        }

        .form-floating {
            margin-top: 20px;
        }

        .form-floating textarea {
            height: 100px;
        }

        .star {
            display: flex;
            gap: 5px;
            cursor: pointer;
        }

        .star a {
            font-size: 30px;
            color: #ccc;
            transition: color 0.2s ease-in-out;
        }

        .star a.bi-star-fill {
            color: gold;
        }

        .btn {
            margin-bottom: 15px;
        }

        .btn-primary {
            background: linear-gradient(-300deg, #203D54 0%, #f2f7ff 100%);
            color: #203D54;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 16px;
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
        }
    </style>
</head>

<body>
    <div class="container my-5 position-relative">
        <div class="row">
            <div class="col-12">
                <h1 class="text-uppercase">Ulasan untuk {{ $destinasi->nama_destinasi }}</h1>
            </div>
        </div>

        <!-- Alert for Success -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form Tambah Ulasan -->
        @auth
            <form action="{{ route('ulasan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id_destinasi" value="{{ $destinasi->id_destinasi }}">
                <input type="hidden" name="id_user" value="{{ auth()->user()->id }}">
                <input type="hidden" name="rating" id="ratingInput" value="0">
                <!-- Input tersembunyi untuk rating -->

                <div>
                    <!-- Isi Ulasan -->
                    <div class="form-floating">
                        <textarea name="isi_ulasan" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required></textarea>
                        <label for="floatingTextarea2">Isi Ulasan</label>
                    </div>

                    <!-- Rating Input -->
                    <div class="form-group mt-3">
                        <label for="rating">Rating:</label>
                        <div class="star">
                            <a href="#" class="bi bi-star" data-value="1"></a>
                            <a href="#" class="bi bi-star" data-value="2"></a>
                            <a href="#" class="bi bi-star" data-value="3"></a>
                            <a href="#" class="bi bi-star" data-value="4"></a>
                            <a href="#" class="bi bi-star" data-value="5"></a>
                        </div>
                    </div>

                    <!-- Upload Photo -->
                    <div class="form-group mt-3">
                        <label for="foto_ulasan">Foto Ulasan:</label>
                        <input type="file" name="foto_ulasan" class="form-control" id="foto_ulasan">
                    </div>

                    <!-- Submit Button -->
                    <div class="d-flex justify-content-between mt-3">
                        <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
                    </div>
                </div>
            </form>
        @else
            <p>Silakan <a href="{{ route('login.form') }}">login</a> untuk menulis ulasan.</p>
        @endauth

        <!-- Menampilkan daftar ulasan -->
        @include('features.list_ulasan', ['ulasan' => $ulasan])

        <!-- Back Button -->
        <div class="mt-3">
            <a href="{{ route('features.detail_destinasi', $destinasi->id_destinasi) }}"
                class="btn btn-secondary">Kembali ke Detail Destinasi</a>
        </div>

        <script>
            const stars = document.querySelectorAll('.star a');
            const ratingInput = document.getElementById('ratingInput');

            stars.forEach((star, index1) => {
                star.addEventListener('click', (e) => {
                    e.preventDefault();
                    const ratingValue = star.getAttribute('data-value');
                    ratingInput.value = ratingValue;

                    // Perbarui tampilan bintang
                    stars.forEach((item, index2) => {
                        if (index2 < ratingValue) {
                            item.classList.add('bi-star-fill');
                            item.classList.remove('bi-star');
                        } else {
                            item.classList.add('bi-star');
                            item.classList.remove('bi-star-fill');
                        }
                    });
                });
            });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</body>
</html>