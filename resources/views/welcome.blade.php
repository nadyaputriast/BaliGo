<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Main Page</title>
</head>

<body>
    <div class="container mt-5">
        <a href="{{ route('welcome') }}" class="btn btn-link">Home</a>
        <a href="{{ route('features.plan_trip') }}" class="btn btn-link">Plan Trip</a>
        <a href="{{ route('features.sorting') }}" class="btn btn-link">Destination</a>
        <a href="{{ route('register.form') }}" class="btn btn-link">Register</a>
        <a href="{{ route('login.form') }}" class="btn btn-link">Login</a>
        <a href="{{ route('profile.form') }}" class="btn btn-link">Profile</a>
        <h1>BaliGo</h1>

        <form action="{{ route('features.searching') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="keyword" class="form-control" placeholder="Cari tempat wisata...">
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <h2>DESTINATION HIGHLIGHT</h2>
        <div class="row">
            @foreach ($kabupatenList as $kabupaten)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Gambar Kabupaten">
                        <div class="card-body">
                            <a href="{{ route('features.kabupaten', ['kabupaten_kota' => $kabupaten]) }}" class="btn btn-primary">{{ $kabupaten }}</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <h2>JOURNEY INSPIRATION</h2>
        <div>
            <h4>Most Affordable</h4>
            @if ($mostAffordable)
                <img src="{{ asset('storage/' . $mostAffordable->foto_destinasi) }}" class="card-img-top" alt="Gambar Destinasi">
                <h5 class="card-title">{{ $mostAffordable->nama_destinasi }}</h5>
                <p class="card-text">Harga Tiket: {{ $mostAffordable->harga_tiket }}</p>
                <p class="card-text">Rating: {{ $mostAffordable->rating_destinasi }}</p>
                <a href="{{ route('features.detail_destinasi', ['id' => $mostAffordable->id_destinasi]) }}" class="btn btn-primary">Lihat Detail</a>
            @endif
        </div>
        <div>
            <h4>Most Popular</h4>
            @if ($mostPopular)
                <img src="{{ asset('storage/' . $mostPopular->foto_destinasi) }}" class="card-img-top" alt="Gambar Destinasi">
                <h5 class="card-title">{{ $mostPopular->nama_destinasi }}</h5>
                <p class="card-text">Harga Tiket: {{ $mostPopular->harga_tiket }}</p>
                <p class="card-text">Rating: {{ $mostPopular->rating_destinasi }}</p>
                <a href="{{ route('features.detail_destinasi', ['id' => $mostPopular->id_destinasi]) }}" class="btn btn-primary">Lihat Detail</a>
            @endif
        </div>
    </div>
</body>
</html>