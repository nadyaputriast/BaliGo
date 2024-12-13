<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Hasil Pencarian</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #FFFFFF;
            overflow-x: hidden;
            overflow-y: auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .card-img {
            width: 100%;
            height: 100%;
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

        .card-title {
            font-size: 20px;
            font-weight: bold;
        }

        .card-text {
            font-size: 14px;
            line-height: 1.5;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
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
            margin-left: 20px;
        }
    </style>

    <head>

    <body>
        <div class="container-fluid mt-5">
            <h1 class="mb-3">Hasil Pencarian untuk "{{ $keyword }}"</h1>
            @if ($results->isEmpty())
                <div class="alert alert-danger" role="alert">
                    Tidak ada hasil yang ditemukan!
                </div>
            @else
                <div class="row">
                    @foreach ($results as $dw)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                @if ($dw->foto_destinasi)
                                    <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" class="card-img"
                                        alt="Gambar Destinasi">
                                @else
                                    <img src="https://via.placeholder.com/150" class="card-img" alt="Tidak ada gambar">
                                @endif
                                <div class="card-img-overlay">
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
            @endif
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-secondary mb-3">Kembali</a>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>