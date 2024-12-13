<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi Wisata</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet" />
    <header>
        <div class="logo">BaliGo</div>
    </header>
    <style>
        :root {
            --primary-color: #2C3E50;
            --secondary-color: #4A6572;
            --background-color: #5398e1;
            /* Light Blue Background */
            --card-background: #FFFFFF;
            --text-color: #333;
            --input-border: #B0C4DE;
        }

        header {
            display: flow-root;
            align-items: flex-end;
            padding: 2rem;
            background-color: #2C3E50;
            color: #FFFFFF;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
            margin-right: 1rem;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            min-height: 100vh;
            padding-top: 2rem;
            padding-bottom: 2rem;
            background: linear-gradient(45deg, #AAD4F5, #203D54);
            background: linear-gradient(180deg, #6B7F8E 0%, #FFFFFF 100%);
        }

        body::before {
            content: 'BaliGo';
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-45deg);
            font-size: 150px;
            color: rgba(255, 255, 255, 0.1);
            font-weight: bold;
            z-index: -1;
            pointer-events: none;
        }

        .container-form {
            background-color: var(--card-background);
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 2rem;
        }

        .form-section {
            background-color: #F7FAFC;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid var(--input-border);
        }

        .form-section-header {
            background-color: #E9F5FF;
            color: var(--primary-color);
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
        }

        .form-section-header i {
            margin-right: 10px;
        }

        .form-label {
            font-weight: 600;
            color: var(--primary-color);
        }

        .form-control,
        .form-select {
            border-color: var(--input-border);
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4A90E2;
            box-shadow: 0 0 0 0.2rem rgba(74, 144, 226, 0.25);
        }

        .btn-primary {
            background-color: #4A90E2;
            border-color: #4A90E2;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #357ABD;
            border-color: #357ABD;
        }

        .input-group-text {
            background-color: #E9F5FF;
            border-color: var(--input-border);
        }

        .img-preview {
            max-height: 250px;
            object-fit: cover;
            border-radius: 10px;
            border: 3px solid #E9F5FF;
        }

        @media (max-width: 768px) {
            .container-form {
                padding: 1rem;
                border-radius: 0;
            }

            .form-section {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 container-form">
                <div class="form-section-header mb-4">
                    <i class="fas fa-edit fa-2x"></i>
                    <h2 class="mb-0">Edit Destinasi Wisata</h2>
                </div>

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('pages.update', $destinasiWisata->id_destinasi) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-info-circle"></i>
                            Informasi Dasar Destinasi
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_destinasi" class="form-label">Nama Destinasi</label>
                                <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi"
                                    value="{{ $destinasiWisata->nama_destinasi }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kabupaten_kota" class="form-label">Kabupaten/Kota</label>
                                <select class="form-select" id="kabupaten_kota" name="kabupaten_kota" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach (\App\Models\DestinasiWisata::getKabupatenKotaOptions() as $kota)
                                        <option value="{{ $kota }}"
                                            {{ $destinasiWisata->kabupaten_kota == $kota ? 'selected' : '' }}>
                                            {{ $kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="harga_tiket" class="form-label">Harga Tiket</label>
                                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket"
                                    value="{{ $destinasiWisata->harga_tiket }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="rating_destinasi" class="form-label">Rating</label>
                                <input type="number" class="form-control" id="rating_destinasi" name="rating_destinasi"
                                    value="{{ $destinasiWisata->rating_destinasi }}" min="0" max="5"
                                    step="0.1">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="jenis_wisata" class="form-label">Jenis Wisata</label>
                                <select class="form-select" id="jenis_wisata" name="jenis_wisata" required>
                                    <option value="">Pilih Jenis Wisata</option>
                                    @foreach (\App\Models\DestinasiWisata::getJenisWisataOptions() as $jenis)
                                        <option value="{{ $jenis }}"
                                            {{ $destinasiWisata->jenis_wisata == $jenis ? 'selected' : '' }}>
                                            {{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-map-marker-alt"></i>
                            Lokasi & Kontak
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                                    value="{{ $destinasiWisata->alamat_lengkap }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="link_maps" class="form-label">Link Google Maps</label>
                                <input type="text" class="form-control" id="link_maps" name="link_maps"
                                    value="{{ $destinasiWisata->link_maps }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="contact_person" class="form-label">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person"
                                    value="{{ $destinasiWisata->contact_person }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="reservasi" class="form-label">Reservasi</label>
                                <input type="text" class="form-control" id="reservasi" name="reservasi"
                                    value="{{ $destinasiWisata->reservasi }}" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="jam_buka" class="form-label">Jam Operasional</label>
                                <div class="input-group">
                                    <input type="time" class="form-control" id="jam_buka" name="jam_buka"
                                        value="{{ $destinasiWisata->jam_buka }}" required>
                                    <span class="input-group-text">-</span>
                                    <input type="time" class="form-control" id="jam_tutup" name="jam_tutup"
                                        value="{{ $destinasiWisata->jam_tutup }}" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-image"></i>
                            Foto & Fasilitas
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="foto_destinasi" class="form-label">Foto Destinasi</label>
                                <input type="file" class="form-control" id="foto_destinasi"
                                    name="foto_destinasi">
                                @if ($destinasiWisata->foto_destinasi)
                                    <img src="{{ asset('storage/' . $destinasiWisata->foto_destinasi) }}"
                                        alt="Foto Destinasi" class="img-fluid img-preview mt-3">
                                @endif
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Fasilitas</label>
                                <div id="fasilitas-container">
                                    @foreach ($destinasiWisata->fasilitas as $fasilitas)
                                        <div class="input-group mb-2">
                                            <input type="text" class="form-control" name="fasilitas[]"
                                                value="{{ $fasilitas->fasilitas }}" placeholder="Fasilitas Baru">
                                            <button type="button" class="btn btn-danger"
                                                onclick="removeFasilitas(this)">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-primary mt-2" onclick="addFasilitas()">
                                    <i class="fas fa-plus me-2"></i>Tambah Fasilitas
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-globe"></i>
                            Website & Media Sosial
                        </div>
                        <div id="website-medsos-container">
                            @foreach ($destinasiWisata->website_medsos as $website_medsos)
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" name="website_medsos[]"
                                        value="{{ $website_medsos->website_medsos }}"
                                        placeholder="Website/Medsos Baru">
                                    <button type="button" class="btn btn-danger" onclick="removeMedsos(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-primary mt-2" onclick="addMedsos()">
                            <i class="fas fa-plus me-2"></i>Tambah Website/Medsos
                        </button>
                    </div>

                    <div class="row mt-4">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-lg w-100">
                                <i class="fas fa-save me-2"></i>Update Destinasi Wisata
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function addFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="fasilitas[]" placeholder="Fasilitas Baru">
                <button type="button" class="btn btn-danger" onclick="removeFasilitas(this)">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function removeFasilitas(button) {
            button.parentElement.remove();
        }

        function addMedsos() {
            const container = document.getElementById('website-medsos-container');
            const div = document.createElement('div');
            div.className = 'input-group mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="website_medsos[]" placeholder="Website/Medsos Baru">
                <button type="button" class="btn btn-danger" onclick="removeMedsos(this)">
                    <i class="fas fa-trash"></i>
                </button>
            `;
            container.appendChild(div);
        }

        function removeMedsos(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>