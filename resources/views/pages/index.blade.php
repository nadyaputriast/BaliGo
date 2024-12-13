<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Destinasi Wisata</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(45deg, #AAD4F5, #203D54);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container-fluid {
            padding: 30px;
        }

        .card-header {
            background-color: #3498db;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-responsive {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .table {
            margin-bottom: 0;
            background-color: white;
        }

        .table thead {
            background-color: #f8f9fa;
        }

        .table img {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
            transition: transform 0.3s ease;
        }

        .table img:hover {
            transform: scale(1.1);
        }

        .fasilitas-list,
        .medsos-list {
            list-style-type: none;
            padding-left: 0;
            margin-bottom: 0;
        }

        .fasilitas-list li,
        .medsos-list li {
            margin-bottom: 5px;
            font-size: 0.9em;
        }

        .medsos-list a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s ease;
        }

        .medsos-list a:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        .btn-action {
            margin: 2px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-action i {
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .container-fluid {
                padding: 10px;
            }

            .table-responsive {
                font-size: 0.8em;
            }

            .btn-action {
                padding: 0.25rem 0.5rem;
                font-size: 0.75rem;
            }
        }

        .alert-custom {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 1050;
            min-width: 300px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h1 class="mb-0">
                    <i class="fas fa-map-marked-alt mr-2"></i>Daftar Destinasi Wisata
                </h1>
                <a href="{{ route('pages.create') }}" class="btn btn-success btn-action">
                    <i class="fas fa-plus"></i>Tambah Data
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-custom alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover table-striped">
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
                                        <img src="{{ asset('storage/' . $dw->foto_destinasi) }}" alt="Gambar Destinasi"
                                            class="img-fluid">
                                    @else
                                        <span class="text-muted">Tidak ada gambar</span>
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
                                    @if ($dw->fasilitas->isEmpty())
                                        <span class="text-muted">Tidak ada fasilitas</span>
                                    @else
                                        <ul class="fasilitas-list">
                                            @foreach ($dw->fasilitas as $fasilitas)
                                                <li>{{ $fasilitas->fasilitas }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    @if ($dw->website_medsos->isEmpty())
                                        <span class="text-muted">Tidak ada media sosial</span>
                                    @else
                                        <ul class="medsos-list">
                                            @foreach ($dw->website_medsos as $medsos)
                                                <li><a href="{{ $medsos->website_medsos }}"
                                                        target="_blank">{{ $medsos->website_medsos }}</a></li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('pages.edit', ['id' => $dw->id_destinasi]) }}"
                                        class="btn btn-warning btn-sm btn-action">
                                        <i class="fas fa-edit"></i>Edit
                                    </a>
                                    <form action="{{ route('pages.destroy', $dw->id_destinasi) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm btn-action">
                                            <i class="fas fa-trash"></i>Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="card-footer text-center">
                <a href="{{ route('welcome') }}" class="btn btn-secondary btn-action">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>