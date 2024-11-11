<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Destinasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>{{ $destinasiWisata->nama_destinasi }}</h1>
        @if ($destinasiWisata->foto_destinasi)
            <img src="{{ asset('storage/' . $destinasiWisata->foto_destinasi) }}" class="img-fluid"
                alt="Gambar Destinasi">
        @else
            <img src="https://via.placeholder.com/150" class="img-fluid" alt="Tidak ada gambar">
        @endif
        <ul class="list-group mt-3">
            <li class="list-group-item"><strong>Kabupaten/Kota:</strong> {{ $destinasiWisata->kabupaten_kota }}</li>
            <li class="list-group-item"><strong>Harga Tiket:</strong> {{ $destinasiWisata->harga_tiket }}</li>
            <li class="list-group-item"><strong>Rating:</strong> {{ $destinasiWisata->rating_destinasi }}</li>
            <li class="list-group-item"><strong>Contact Person:</strong> {{ $destinasiWisata->contact_person }}</li>
            <li class="list-group-item"><strong>Alamat Lengkap:</strong> {{ $destinasiWisata->alamat_lengkap }}</li>
            <li class="list-group-item"><strong>Link Google Maps:</strong> <a href="{{ $destinasiWisata->link_maps }}"
                    target="_blank">{{ $destinasiWisata->alamat_lengkap }}</a></li>
            <li class="list-group-item"><strong>Jenis Wisata:</strong> {{ $destinasiWisata->jenis_wisata }}</li>
            <li class="list-group-item"><strong>Reservasi: </strong>
                @if (preg_match('/^\d+$/', $destinasiWisata->reservasi))
                    <!-- Jika hanya angka (biasanya nomor whatsapp) -->
                    <a href="https://wa.me/{{ $destinasiWisata->reservasi }}" target="_blank">Reservasi di Sini!</a>
                @else
                    <!-- Jika link adalah URL biasa -->
                    <a href="{{ $destinasiWisata->reservasi }}" target="_blank">Reservasi di Sini!</a>
                @endif
            </li>
            <li class="list-group-item"><strong>Jam Buka:</strong> {{ $destinasiWisata->jam_buka }}</li>
            <li class="list-group-item"><strong>Jam Tutup:</strong> {{ $destinasiWisata->jam_tutup }}</li>
            <li class="list-group-item"><strong>Fasilitas:</strong>
                @if ($destinasiWisata->fasilitas && $destinasiWisata->fasilitas->isNotEmpty())
                    <ul>
                        @foreach ($destinasiWisata->fasilitas as $fasilitas)
                            <li>{{ $fasilitas->fasilitas }}</li>
                        @endforeach
                    </ul>
                @else
                    <span>Tidak ada fasilitas</span>
                @endif
            </li>
            <li class="list-group-item"><strong>Website Medsos:</strong>
                @if ($destinasiWisata->website_medsos && $destinasiWisata->website_medsos->isNotEmpty())
                    <ul>
                        @foreach ($destinasiWisata->website_medsos as $website_medsos)
                            <li><a href="{{ $website_medsos->website_medsos }}"
                                    target="_blank">{{ $website_medsos->website_medsos }}</a></li>
                        @endforeach
                    </ul>
                @else
                    <span>Tidak ada media sosial</span>
                @endif
            </li>
        </ul>
        <a href="{{ route('ulasan.show', $destinasiWisata->id_destinasi) }}" class="btn btn-secondary mt-3">Lihat Ulasan</a>
        {{-- <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Kembali</a> --}}
        <a href="{{ route('welcome') }}" class="btn btn-primary mt-3">Kembali</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
