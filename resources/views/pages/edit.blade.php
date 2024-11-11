<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Destinasi Wisata</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Destinasi Wisata</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pages.update', $destinasiWisata->id_destinasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama_destinasi">Nama Destinasi</label>
                <input type="text" class="form-control" id="nama_destinasi" name="nama_destinasi" value="{{ $destinasiWisata->nama_destinasi }}" required>
            </div>
            <div class="form-group">
                <label for="kabupaten_kota">Kabupaten/Kota</label>
                <select class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                    <option value="">Pilih Kabupaten/Kota</option>
                    @foreach (\App\Models\DestinasiWisata::getKabupatenKotaOptions() as $kota)
                        <option value="{{ $kota }}" {{ $destinasiWisata->kabupaten_kota == $kota ? 'selected' : '' }}>{{ $kota }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="harga_tiket">Harga Tiket</label>
                <input type="number" class="form-control" id="harga_tiket" name="harga_tiket" value="{{ $destinasiWisata->harga_tiket }}" required>
            </div>
            <div class="form-group">
                <label for="rating_destinasi">Rating</label>
                <input type="number" class="form-control" id="rating_destinasi" name="rating_destinasi" value="{{ $destinasiWisata->rating_destinasi }}" min="0" max="5" step="0.1">
            </div>
            <div class="form-group">
                <label for="contact_person">Contact Person</label>
                <input type="text" class="form-control" id="contact_person" name="contact_person" value="{{ $destinasiWisata->contact_person }}" required>
            </div>
            <div class="form-group">
                <label for="alamat_lengkap">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap" value="{{ $destinasiWisata->alamat_lengkap }}" required>
            </div>
            <div class="form-group">
                <label for="link_maps">Link Google Maps</label>
                <input type="text" class="form-control" id="link_maps" name="link_maps" value="{{ $destinasiWisata->link_maps }}" required>
            </div>
            <div class="form-group">
                <label for="jenis_wisata">Jenis Wisata</label>
                <select class="form-control" id="jenis_wisata" name="jenis_wisata" required>
                    <option value="">Pilih Jenis Wisata</option>
                    @foreach (\App\Models\DestinasiWisata::getJenisWisataOptions() as $jenis)
                        <option value="{{ $jenis }}" {{ $destinasiWisata->jenis_wisata == $jenis ? 'selected' : '' }}>{{ $jenis }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="reservasi">Reservasi</label> 
                <input type="text" class="form-control" id="reservasi" name="reservasi" value="{{ $destinasiWisata->reservasi }}" required>
            </div>
            <div class="form-group">
                <label for="jam_buka">Jam Buka</label>
                <input type="time" class="form-control" id="jam_buka" name="jam_buka" value="{{ $destinasiWisata->jam_buka }}" required>
            </div>
            <div class="form-group">
                <label for="jam_tutup">Jam Tutup</label>
                <input type="time" class="form-control" id="jam_tutup" name="jam_tutup" value="{{ $destinasiWisata->jam_tutup }}" required>
            </div>
            <div class="form-group">
                <label for="foto_destinasi">Foto Destinasi</label>
                <input type="file" class="form-control" id="foto_destinasi" name="foto_destinasi">
                @if ($destinasiWisata->foto_destinasi)
                    <img src="{{ asset('storage/' . $destinasiWisata->foto_destinasi) }}" alt="Foto Destinasi" class="img-fluid mt-2">
                @endif
            </div>
            <div class="form-group">
                <label for="fasilitas">Fasilitas</label>
                <div id="fasilitas-container">
                    @foreach ($destinasiWisata->fasilitas as $fasilitas)
                        <div class="d-flex mb-2">
                            <input type="text" class="form-control" name="fasilitas[]" value="{{ $fasilitas->fasilitas }}" placeholder="Fasilitas Baru">
                            <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeFasilitas(this)">Hapus</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary" onclick="addFasilitas()">Tambah Fasilitas</button>
            </div>            
            <div class="form-group">
                <label for="website_medsos">Website Medsos</label>
                <div id="fasilitas-container">
                    @foreach ($destinasiWisata->website_medsos as $website_medsos)
                        <div class="d-flex mb-2">
                            <input type="text" class="form-control" name="website_medsos[]" value="{{ $website_medsos->website_medsos }}" placeholder="Webiste Medsos Baru">
                            <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeMedsos(this)">Hapus</button>
                        </div>
                    @endforeach
                </div>
                <button type="button" class="btn btn-primary" onclick="addMedsos()">Tambah Medsos</button>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
        function addFasilitas() {
            const container = document.getElementById('fasilitas-container');
            const div = document.createElement('div');
            div.className = 'd-flex mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="fasilitas[]" placeholder="Fasilitas Baru">
                <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeFasilitas(this)">Hapus</button>
            `;
            container.appendChild(div);
        }

        function removeFasilitas(button) {
            button.parentElement.remove();
        }

        function addMedsos() {
            const container = document.getElementById('website-medsos-container');
            const div = document.createElement('div');
            div.className = 'd-flex mb-2';
            div.innerHTML = `
                <input type="text" class="form-control" name="website_medsos[]" placeholder="Website Medsos Baru">
                <button type="button" class="btn btn-danger btn-sm ml-2" onclick="removeMedsos(this)">Hapus</button>
            `;
            container.appendChild(div);
        }

        function removeMedsos(button) {
            button.parentElement.remove();
        }
    </script>
</body>
</html>