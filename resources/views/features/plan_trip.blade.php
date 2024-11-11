<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plan Trip</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Plan Your Trip</h1>
        <form action="{{ route('features.plan_trip') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="budget" class="form-label">Budget Maksimum</label>
                <input type="number" name="budget" class="form-control" id="budget" required>
            </div>
            <div class="mb-3">
                <label for="jumlah_destinasi" class="form-label">Banyak Destinasi yang Ingin Dikunjungi</label>
                <input type="number" name="jumlah_destinasi" class="form-control" id="jumlah_destinasi" required min="1">
            </div>
            <div class="mb-3">
                <label for="kabupaten_kota" class="form-label">Pilih Kabupaten/Kota</label>
                <select name="kabupaten_kota[]" class="form-select" id="kabupaten_kota" multiple required>
                    @foreach ($kabupatenList as $kabupaten)
                        <option value="{{ $kabupaten }}">{{ $kabupaten }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Plan Trip</button>
    <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>