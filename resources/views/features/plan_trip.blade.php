<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <title>Plan Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(180deg, #6B7F8E 0%, #FFFFFF 100%);
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow-x: hidden;
        }

        .btn-primary {
            background: linear-gradient(-300deg, #203D54 0%, #FFFFFF 100%);
            color: #203D54;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 16px;
            width: 100%;
            margin-right: 10px;
        }

        .btn-primary:hover {
            color: #203D54;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #FFFFFF;
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            font-weight: 600;
            font-size: 16px;
            text-align: center;
        }

        .row-cols-md-3 {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
    </style>
</head>

<body>
    <form action="{{ route('features.plan_trip') }}" method="POST">
        @csrf
        <div class="container-fluid mt-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="row g-3 align-items-center">
                        <!-- Input Jumlah Destinasi -->
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-map-pin"></i></span>
                                <input type="number" name="jumlah_destinasi" class="form-control" id="jumlah_destinasi"
                                    required min="1" placeholder="Banyak Destinasi yang Dikunjungi">
                            </div>
                        </div>

                        <!-- Dropdown Kabupaten/Kota -->
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-city"></i></span>
                                <select name="kabupaten_kota[]" class="form-select" id="kabupaten_kota">
                                    @foreach ($kabupatenList as $kabupaten)
                                        <option value="{{ $kabupaten }}">{{ $kabupaten }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Input Budget -->
                        <div class="col-md-3">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-money-bill"></i></span>
                                <input type="number" name="budget" class="form-control" id="budget" required
                                    min="1" placeholder="Budget (Rp)">
                                <span class="input-group-text">.00</span>
                            </div>
                        </div>

                        <!-- Tombol Plan Trip -->
                        <div class="col-md-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Plan Trip</button>

                            <!-- Tombol Kembali -->
                            <a href="{{ route('welcome') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>