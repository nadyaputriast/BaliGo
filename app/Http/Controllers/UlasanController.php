<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\DestinasiWisata;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    public function show($id)
    {
        $destinasi = DestinasiWisata::findOrFail($id);
        $ulasan = Ulasan::where('id_destinasi', $id)->get();
        return view('features.ulasan', compact('destinasi', 'ulasan'));
    }

    public function store(Request $request)
    {
        $userId = Auth::id();
        if (!$userId) {
            return redirect()->route('login.form')->with('error', 'Anda harus login untuk memberikan ulasan.');
        }

        $request->validate([
            'isi_ulasan' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
            'foto_ulasan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Temukan destinasi terlebih dahulu
        $destinasi = DestinasiWisata::findOrFail($request->id_destinasi);

        // Rating awal
        $ratingLama = $destinasi->rating_destinasi ?? 5;
        $ratingBaru = $request->rating;

        // Hitung rating baru dengan rata-rata
        $ratingKumulatif = round(($ratingLama + $ratingBaru) / 2, 1);

        // Simpan data ulasan
        $ulasanData = new Ulasan();
        $ulasanData->tanggal_ulasan = Carbon::now();
        $ulasanData->isi_ulasan = $request->isi_ulasan;
        $ulasanData->rating = $request->rating;
        $ulasanData->id_user = $userId;
        $ulasanData->id_destinasi = $request->id_destinasi;

        // Jika ada foto ulasan, simpan file-nya
        if ($request->hasFile('foto_ulasan')) {
            $filename = $request->file('foto_ulasan')->store('ulasan', 'public');
            $ulasanData->foto_ulasan = $filename;
        }

        $ulasanData->save();

        // Update rating destinasi
        $destinasi->rating_destinasi = $ratingKumulatif;
        $destinasi->save();

        return redirect()->route('ulasan.show', $request->id_destinasi)->with('success', 'Ulasan berhasil ditambahkan.');
    }
}