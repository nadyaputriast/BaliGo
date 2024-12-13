<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi Wisata</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(45deg, #AAD4F5, #203D54);
            background: linear-gradient(180deg, #6B7F8E 0%, #FFFFFF 100%);
            background-attachment: fixed;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            background-color: rgb(250, 255, 255);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background-color: rgba(135, 206, 250, 0.1);
            transform: rotate(-45deg);
            z-index: -1;
        }

        .form-group label {
            font-weight: 600;
            color: #2c3e50;
        }

        .btn-primary {
            background-color: #3498db;
            border-color: #2980b9;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
        }

        .btn-danger {
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            transform: translateY(-2px);
        }

        .dynamic-input-group {
            display: flex;
            margin-bottom: 10px;
        }

        .dynamic-input-group input {
            flex-grow: 1;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
                margin-top: 0;
                box-shadow: none;
            }

            .dynamic-input-group {
                flex-direction: column;
            }

            .dynamic-input-group .btn {
                margin-top: 5px;
                width: 100%;
            }
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .alert-custom {
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
        }

        h1 {
            color: #2c3e50;
            margin-bottom: 30px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">Tambah Destinasi Wisata</h1>

                @if (session('success'))
                    <div class="alert alert-success alert-custom">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_destinasi">Nama Destinasi</label>
                                <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kabupaten_kota">Kabupaten/Kota</label>
                                <select class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                                    <option value="">Pilih Kabupaten/Kota</option>
                                    @foreach ($kabupatenList as $kota)
                                        <option value="{{ $kota }}">{{ $kota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga_tiket">Harga Tiket</label>
                                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket"
                                    step="1000" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="rating_destinasi">Rating</label>
                                <input type="number" class="form-control" id="rating_destinasi" name="rating_destinasi"
                                    min="0" max="5" step="0.1">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_person">Contact Person</label>
                                <input type="text" class="form-control" id="contact_person" name="contact_person"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="reservasi">Reservasi</label>
                                <input type="text" class="form-control" id="reservasi" name="reservasi" required
                                    placeholder="Contoh: 62812345678">
                                <small class="form-text text-muted">Untuk Whatsapp, ganti digit 0 pertama dengan
                                    62</small>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="link_maps">Link Google Maps</label>
                                <input type="text" class="form-control" id="link_maps" name="link_maps" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_wisata">Jenis Wisata</label>
                                <select class="form-control" id="jenis_wisata" name="jenis_wisata" required>
                                    <option value="">Pilih Jenis Wisata</option>
                                    @foreach ($jenisWisataList as $jenis)
                                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_buka">Jam Buka</label>
                                <input type="time" class="form-control" id="jam_buka" name="jam_buka" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jam_tutup">Jam Tutup</label>
                                <input type="time" class="form-control" id="jam_tutup" name="jam_tutup" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="foto_destinasi">Foto Destinasi</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="foto_destinasi"
                                        name="foto_destinasi" required>
                                    <label class="custom-file-label" for="foto_destinasi">Pilih Foto</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <div id="fasilitas-container">
                                    <div class="dynamic-input-group">
                                        <input type="text" name="fasilitas[]" class="form-control"
                                            placeholder="Fasilitas">
                                        <button type="button" class="btn btn-primary btn-sm ml-2"
                                            onclick="addFasilitas()">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Website Sosial Media</label>
                                <div id="social-media-container">
                                    <div class="dynamic-input-group">
                                        <input type="text" name="website_medsos[]" class="form-control"
                                            placeholder="Website Sosial Media">
                                        <button type="button" class="btn btn-primary btn-sm ml-2"
                                            onclick="addSocialMedia()">Tambah</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Tambah Destinasi</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const div = document.createElement('div');
            div.className = 'dynamic-input-group';
            div.innerHTML = `
                <input type="text" name="fasilitas[]" class="form-control" placeholder="Fasilitas">
                <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeFasilitas(this)">Hapus</button>
            `;
            container.appendChild(div);
        }

        function addSocialMedia() {
            const container = document.getElementById('social-media-container');
            const div = document.createElement('div');
            div.className = 'dynamic-input-group';
            div.innerHTML = `
                <input type="text" name="website_medsos[]" class="form-control" placeholder="Website Sosial Media">
                <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeSocialMedia(this)">Hapus</button>
            `;
            container.appendChild(div);
        }

        function removeFasilitas(button) {
            button.parentElement.remove();
        }

        function removeSocialMedia(button) {
            button.parentElement.remove();
        }

        // Custom file input label
        document.querySelector('.custom-file-input').addEventListener('change', function(e) {
            var fileName = document.getElementById("foto_destinasi").files[0].name;
            var nextSibling = e.target.nextElementSibling;
            nextSibling.innerHTML = fileName;
        });
    </script>

    <!-- Bootstrap and jQuery Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
