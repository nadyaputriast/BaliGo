<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table img {
            max-width: 100px;
            height: auto;
        }
        .fasilitas-list, .medsos-list {
            list-style-type: none;
            padding-left: 0;
        }
        .fasilitas-list li, .medsos-list li {
            margin-bottom: 5px;
        }
        .medsos-list a {
            text-decoration: none;
            color: #007bff;
        }
        .medsos-list a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1>Daftar Destinasi Wisata</h1>
    <a href="{{ route('pages.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Gambar</th>
                <th>Nama Destinasi</th>
                <th>Kabupaten/Kota</th>
                <th>Harga Tiket</th>
                <th>Rating</th>
                <th>Contact Person</th>
                <th>Alamat Lengkap</th>
                <th>Link Google Maps</th>
                <th>Jenis Wisata</th>
                <th>Reservasi</th>
                <th>Jam Buka</th>
                <th>Jam Tutup</th>
                <th>Fasilitas</th>
                <th>Website Medsos</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($destinasiWisata as $dw)
                <tr>
                    <td>
                        @if ($dw->foto_destinasi)
                            <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" alt="Gambar Destinasi">
                        @else
                            <span>Tidak ada gambar</span>
                        @endif
                    </td>
                    <td>{{ $dw->nama_destinasi }}</td>
                    <td>{{ $dw->kabupaten_kota }}</td>
                    <td>{{ $dw->harga_tiket }}</td>
                    <td>{{ $dw->rating_destinasi }}</td>
                    <td>{{ $dw->contact_person }}</td>
                    <td>{{ $dw->alamat_lengkap }}</td>
                    <td>{{ $dw->link_maps }}</td>
                    <td>{{ $dw->jenis_wisata }}</td>
                    <td>{{ $dw->reservasi }}</td>
                    <td>{{ $dw->jam_buka }}</td>
                    <td>{{ $dw->jam_tutup }}</td>
                    <td>
                        @if($dw->fasilitas->isEmpty())
                            <span>Tidak ada fasilitas</span>
                        @else
                            <ul class="fasilitas-list">
                                @foreach($dw->fasilitas as $fasilitas)
                                    <li>{{ $fasilitas->fasilitas }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        @if($dw->website_medsos->isEmpty())
                            <span>Tidak ada media sosial</span>
                        @else
                            <ul class="medsos-list">
                                @foreach($dw->website_medsos as $medsos)
                                    <li><a href="{{ $medsos->website_medsos }}" target="_blank">{{ $medsos->website_medsos }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('pages.edit', ['id' => $dw->id_destinasi]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('pages.destroy', $dw->id_destinasi) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('welcome') }}" class="btn btn-primary">Kembali</a>
</div>
</body>
</html>