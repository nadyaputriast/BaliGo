<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DestinasiWisata;

class FeaturesController extends Controller
{
    public function index()
    {
        $kabupatenList = DestinasiWisata::getKabupatenKotaOptions();
        $jenisWisataList = DestinasiWisata::getJenisWisataOptions();

        $mostAffordable = DestinasiWisata::orderBy('harga_tiket', 'asc')->first();
        $mostPopular = DestinasiWisata::orderBy('rating_destinasi', 'desc')->first();

        return view('welcome', compact('kabupatenList', 'mostAffordable', 'mostPopular'));
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
        $budget = $request->input('budget');
        $jumlahDestinasi = $request->input('jumlah_destinasi');
        $kabupatenKota = $request->input('kabupaten_kota');

        // Mengambil destinasi wisata berdasarkan kabupaten/kota yang dipilih
        $destinasiWisata = DestinasiWisata::whereIn('kabupaten_kota', $kabupatenKota)->get();

        // Implementasi algoritma pencarian kombinasi destinasi wisata
        $hasil = [];
        $this->cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, 0, [], $hasil);

        // Filter hasil untuk memastikan kombinasi berada dalam rentang anggaran yang lebih dekat dengan anggaran maksimum
        $hasil = array_filter($hasil, function ($kombinasi) use ($budget) {
            $total_biaya = array_sum(array_column($kombinasi, 'harga_tiket'));
            return $total_biaya >= ($budget * 0.8) && $total_biaya <= $budget;
        });

        return view('features.plan_trip_result', compact('hasil', 'budget', 'kabupatenKota', 'jumlahDestinasi'));
    }

    private function cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, $start, $kombinasi, &$hasil)
    {
        // Jika anggaran negatif, hentikan
        if ($budget < 0) {
            return;
        }

        // Jika kombinasi sudah mencapai jumlah destinasi yang diinginkan, periksa apakah sesuai anggaran
        if (count($kombinasi) == $jumlahDestinasi) {
            $total_biaya = array_sum(array_column($kombinasi, 'harga_tiket')); // Hitung total harga kombinasi
            if ($total_biaya <= $budget) {
                $hasil[] = $kombinasi;  // Simpan kombinasi valid
            }
            return;
        }

        // Lanjutkan mencari kombinasi
        for ($i = $start; $i < count($destinasiWisata); $i++) {
            $new_kombinasi = array_merge($kombinasi, [$destinasiWisata[$i]]);
            $total_sementara = array_sum(array_column($new_kombinasi, 'harga_tiket')); // Hitung total biaya sementara

            // Jika total biaya sementara tidak melebihi anggaran, lanjutkan ke elemen berikutnya
            if ($total_sementara <= $budget) {
                $this->cariKombinasi($destinasiWisata, $budget, $jumlahDestinasi, $i + 1, $new_kombinasi, $hasil);
            }
        }
    }
}
