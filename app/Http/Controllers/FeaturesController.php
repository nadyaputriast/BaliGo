<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;
use App\Models\Rekomendasi;
use Illuminate\Pagination\LengthAwarePaginator;

class FeaturesController extends Controller
{
    public function index()
    {
        $kabupatenList = DestinasiWisata::getKabupatenKotaOptions();
        $jenisWisataList = DestinasiWisata::getJenisWisataOptions();

        $topDestinasi = [];
        foreach ($jenisWisataList as $jenis) {
            $topDestinasi[$jenis] = DestinasiWisata::where('jenis_wisata', $jenis)
                ->orderBy('rating_destinasi', 'desc')
                ->orderBy('harga_tiket', 'asc')
                ->first();
        }
        
        $mostAffordable = DestinasiWisata::orderBy('harga_tiket', 'asc')->first();
        $mostPopular = DestinasiWisata::orderBy('rating_destinasi', 'desc')->first();

        return view('welcome', compact('kabupatenList', 'topDestinasi', 'mostAffordable', 'mostPopular'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if (!$keyword) {
            return redirect()->back()->withErrors('Masukkan kata kunci untuk pencarian.');
        }

        // Ubah pencarian untuk kolom 'nama_destinasi'
        $results = DestinasiWisata::where('nama_destinasi', 'LIKE', '%' . $keyword . '%')->get();

        return view('features.searching', ['results' => $results, 'keyword' => $keyword]);
    }

    public function detail($id)
    {
        $destinasiWisata = DestinasiWisata::with(['fasilitas', 'website_medsos'])->find($id);

        if (!$destinasiWisata) {
            return redirect()->back()->withErrors('Destinasi wisata tidak ditemukan.');
        }

        return view('features.detail_destinasi', compact('destinasiWisata'));
    }

    public function showByKabupaten($kabupaten_kota)
    {
        $destinasiWisata = DestinasiWisata::where('kabupaten_kota', $kabupaten_kota)->get();
        return view('features.kabupaten', compact('destinasiWisata', 'kabupaten_kota'));
    }

    public function sortKab(Request $request)
    {
        $sorting = $request->input('sorting', 'nama_destinasi');
        $order = $request->input('order', 'asc');
        $kabupaten_kota = $request->input('kabupaten_kota');

        $destinasiWisata = DestinasiWisata::where('kabupaten_kota', $kabupaten_kota)
            ->orderBy($sorting, $order)
            ->get();

        return view('features.kabupaten', compact('destinasiWisata', 'kabupaten_kota'));
    }

    public function sort(Request $request)
    {
        $sort = $request->input('sorting', 'alphabet');
        $order = $request->input('order', 'asc');

        $query = DestinasiWisata::query();

        switch ($sort) {
            case 'price':
                $query->orderBy('harga_tiket', $order);
                break;
            case 'rating':
                $query->orderBy('rating_destinasi', $order);
                break;
            case 'alphabet':
            default:
                $query->orderBy('nama_destinasi', $order);
                break;
        }

        $results = $query->get();

        return view('features.sorting', ['results' => $results, 'sort' => $sort]);
    }

    public function showPlanTripForm()
    {
        $kabupatenList = DestinasiWisata::getKabupatenKotaOptions();
        $jenisWisataList = DestinasiWisata::getJenisWisataOptions();
        return view('features.plan_trip', compact('kabupatenList', 'jenisWisataList'));
    }

    public function planTrip(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'budget' => 'required|numeric',
            'jumlah_destinasi' => 'required|numeric',
            'kabupaten_kota' => 'required|array',
            'per_page' => 'nullable|numeric'
        ]);

        // Simpan data ke session untuk digunakan di result page
        session([
            'trip_data' => [
                'budget' => $validated['budget'],
                'jumlah_destinasi' => $validated['jumlah_destinasi'],
                'kabupaten_kota' => $validated['kabupaten_kota'],
                'per_page' => $validated['per_page'] ?? 10
            ]
        ]);

        // Redirect ke halaman hasil
        return redirect()->route('features.plan_trip_result');
    }

    public function planTripResult(Request $request)
    {
        // Ambil data dari session
        $tripData = session('trip_data');

        if (!$tripData) {
            return redirect()->route('features.plan_trip_form')
                ->with('error', 'Silakan isi form terlebih dahulu');
        }

        $budget = $tripData['budget'];
        $jumlahDestinasi = $tripData['jumlah_destinasi'];
        $kabupatenKota = $tripData['kabupaten_kota'];
        $perPage = $request->input('per_page', $tripData['per_page']);

        // Ambil data destinasi wisata
        $destinasiWisata = DestinasiWisata::whereIn('kabupaten_kota', $kabupatenKota)->get();

        // Inisialisasi array hasil
        $hasil = [];

        // Cari kombinasi
        $this->cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, 0, [], $hasil);

        // Filter hasil
        $hasil = array_filter($hasil, function ($kombinasi) use ($budget) {
            $total_biaya = array_sum(array_column($kombinasi, 'harga_tiket'));
            return $total_biaya >= ($budget * 0.8) && $total_biaya <= $budget;
        });

        $rekomendasi = new Rekomendasi();
        $rekomendasi->maks_budget = $budget;
        // $rekomendasi->kabupaten_kota = implode(', ', $kabupatenKota); // Simpan sebagai string biasa
        $rekomendasi->kabupaten_kota = json_encode($kabupatenKota);
        $rekomendasi->banyak_tempat = $jumlahDestinasi;
        $rekomendasi->save();

        // Pagination
        $page = $request->input('page', 1);
        $offset = ($page - 1) * $perPage;

        $paginatedResults = new LengthAwarePaginator(
            array_slice($hasil, $offset, $perPage),
            count($hasil),
            $perPage,
            $page,
            ['path' => $request->url()]
        );

        return view('features.plan_trip_result', compact('paginatedResults', 'budget', 'kabupatenKota', 'jumlahDestinasi', 'perPage'));
    }

    private function cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, $start, $kombinasi, &$hasil)
    {
        // Pastikan 'kombinasi' adalah array
        if (!is_array($kombinasi)) {
            $kombinasi = [];
        }

        // Jika anggaran sudah negatif, hentikan proses pencarian
        if ($budget < 0) {
            return;
        }

        // Jika jumlah destinasi dalam kombinasi sudah sesuai jumlah yang diinginkan, periksa apakah sesuai anggaran
        if (count($kombinasi) == $jumlahDestinasi) {
            $total_biaya = array_sum(array_column($kombinasi, 'harga_tiket'));
            if ($total_biaya <= $budget) {
                $hasil[] = $kombinasi; // Tambahkan kombinasi yang valid ke hasil
            }
            return;
        }

        // Lakukan pencarian kombinasi secara rekursif
        for ($i = $start; $i < count($destinasiWisata); $i++) {
            $new_kombinasi = array_merge($kombinasi, [$destinasiWisata[$i]]);
            $total_sementara = array_sum(array_column($new_kombinasi, 'harga_tiket'));

            // Jika total sementara tidak melebihi anggaran, lanjutkan pencarian
            if ($total_sementara <= $budget) {
                $this->cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, $i + 1, $new_kombinasi, $hasil);
            }
        }
    }

    public function showByJenisWisata($jenis)
    {
        $destinasiWisata = DestinasiWisata::where('jenis_wisata', $jenis)
            ->orderBy('nama_destinasi', 'asc')
            ->get();

        return view('features.jenis_wisata', compact('destinasiWisata', 'jenis'));
    }
}
