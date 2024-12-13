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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>List Ulasan</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h1 {
            color: #203D54;
        }

        .review-card {
            background-color: #203D54;
            color: white;
            border-radius: 10px;
            padding: 20px;
            height: 100%;
            max-width: 600px;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .review-card .review-date {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 0.9rem;
            color: #ddd;
            padding: 5px 10px;
        }

        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            border-radius: 50%;
        }

        .review-card img {
            width: 100%;
            object-fit: cover;
            border-radius: 5px;
            margin-top: 10px;
        }

        .rating {
            color: #FFD700;
            font-size: 1.2rem;
            margin: 10px 0;
        }

        .review-text {
            flex-grow: 1;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center py-5">
        <div class="col-md-6">
            <h1 class="text-center mb-4" style="font-size: 50px">Travelers Reviews</h1>
            <div id="reviewCarousel" class="carousel slide">
                <div class="carousel-inner">
                    @foreach ($ulasan as $index => $item)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="review-card">
                                <div class="review-date">{{ $item->tanggal_ulasan }}</div>
                                <h5>{{ $item->user->name }}</h5>
                                <!-- Rating -->
                                <div class="rating">
                                    @for ($i = 0; $i < $item->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                    @for ($i = $item->rating; $i < 5; $i++)
                                        <i class="far fa-star"></i>
                                    @endfor
                                </div>
                                <!-- Isi Ulasan -->
                                <p class="review-text">{{ $item->isi_ulasan }}</p>
                                @if ($item->foto_ulasan)
                                    <img src="{{ asset('storage/' . $item->foto_ulasan) }}" class="card-img-top"
                                        alt="Foto Ulasan">
                                @else
                                    <img src="https://via.placeholder.com/600x150?text=No+Image" alt="No Image"
                                        class="card-img-top">
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Tombol Next & Prev -->
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>