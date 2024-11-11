<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Destinasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Tambah Destinasi Wisata</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_destinasi">Nama Destinasi</label>
                <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi" required>
            </div>
            <div class="form-group">
                <label for="kabupaten_kota">Kabupaten/Kota</label>
                <select class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach ($kabupatenList as $kota)
                        <option value="{{ $kota }}">{{ $kota }}</option>
                    @endforeach
                </select>
            </div>            
            <div class="form-group">
                <label for="harga_tiket">Harga Tiket</label>
                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" required>
            </div>
            <div class="form-group">
                <label for="rating_destinasi">Rating</label>
                <input type="number" class="form-control" id="rating_destinasi" name="rating_destinasi" min="0" max="5" step="0.1">
            </div>
            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" required>
            </div>
            <div class="form-group">
                <label for="alamat_lengkap">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" required>
            </div>
            <div class="form-group">
                <label for="link_maps">Link Google Maps</label>
                <input type="text" class="form-control" id="link_maps" name="link_maps" required>
            </div>
            <div class="form-group">
                <label for="jenis_wisata">Jenis Wisata</label>
                <select class="form-control" id="jenis_wisata" name="jenis_wisata" required>
                    <option value="">Pilih Jenis Wisata</option>
                    @foreach ($jenisWisataList as $jenis)
                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group"> {{-- agar bisa direct langsung ke whatsapp --}}
                <label for="reservasi">Reservasi (Jika reservasi melalui Whatsapp, ganti digit 0 pertama dengan 62)</label>
                <input type="text" class="form-control" id="reservasi" name="reservasi" required>
            </div>
            <div class="form-group">
                <label for="jam_buka">Jam Buka</label>
                <input type="time" class="form-control" id="jam_buka" name="jam_buka" required>
            </div>
            <div class="form-group">
                <label for="jam_tutup">Jam Tutup</label>
                <input type="time" class="form-control" id="jam_tutup" name="jam_tutup" required>
            </div>
            <div class="form-group">
                <label for="foto_destinasi">Foto Destinasi</label>
                <input type="file" class="form-control" id="foto_destinasi" name="foto_destinasi" required>
            </div>
            <div class="form-group">
                <label for="fasilitas">Fasilitas</label>
                <div id="fasilitas-container">
                    <div class="d-flex mb-2">
                        <input type="text" name="fasilitas[]" class="form-control" placeholder="Fasilitas">
                        <button type="button" class="btn btn-primary btn-sm ml-2" onclick="addFasilitas()">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="website_medsos">Website Sosial Media</label>
                <div id="social-media-container">
                    <div class="d-flex mb-2">
                        <input type="text" name="website_medsos[]" class="form-control" placeholder="Website Sosial Media">
                        <button type="button" class="btn btn-primary btn-sm ml-2" onclick="addSocialMedia()">Tambah</button>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </form>
    </div>

    <script>
        function addFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const div = document.createElement('div');
            div.className = 'd-flex mb-2';
            div.innerHTML = `
                <input type="text" name="fasilitas[]" class="form-control" placeholder="Fasilitas">
                <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeFasilitas(this)">Hapus</button>
            `;
            container.appendChild(div);
        }

        function addSocialMedia() {
            const container = document.getElementById('social-media-container');
            const div = document.createElement('div');
            div.className = 'd-flex mb-2';
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
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>