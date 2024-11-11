<?php

namespace App\Http\Controllers;

use App\Models\DestinasiWisata;
use App\Models\Fasilitas;
use App\Models\MediaSosial;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Display a listing of all destinasi wisata
    public function index()
    {
        $destinasiWisata = DestinasiWisata::with(['fasilitas', 'website_medsos'])->get();
        return view('pages.index', compact('destinasiWisata'));
    }

    // Show the form for creating a new destinasi wisata
    public function create()
    {
        // Fetch all fasilitas and media sosial options for selection
        $kabupatenList = DestinasiWisata::getKabupatenKotaOptions();
        $jenisWisataList = DestinasiWisata::getJenisWisataOptions();
        $fasilitasList = Fasilitas::all();
        $website_medsosList = MediaSosial::all();

        return view('pages.create', compact('kabupatenList', 'jenisWisataList', 'fasilitasList', 'website_medsosList'));
    }

    // Store a newly created destinasi wisata in the database
    public function store(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'rating_destinasi' => 'nullable|numeric|min:0|max:5',
            'contact_person' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'link_maps' => 'required|string|max:255',
            'jenis_wisata' => 'required|string|max:255',
            'reservasi' => 'required|string|max:255',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'foto_destinasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fasilitas' => 'array',
            'website_medsos' => 'array',
        ]);

        $destinasiWisata = new DestinasiWisata($request->except(['fasilitas', 'website_medsos']));

        // Upload foto destinasi
        if ($request->hasFile('foto_destinasi')) {
            $filename = $request->file('foto_destinasi')->store('destinasi', 'public');
            $destinasiWisata->foto_destinasi = $filename;
        }

        $destinasiWisata->save();

        // Save related data (fasilitas and media sosial)
        $this->saveRelatedData($destinasiWisata->id_destinasi, $request->fasilitas, $request->website_medsos);

        return redirect()->route('pages.index')->with('success', 'Data berhasil disimpan.');
    }

    private function saveRelatedData($id_destinasi, $fasilitas, $website_medsos)
    {
        if (!empty($fasilitas)) {
            foreach ($fasilitas as $fasilitasItem) {
                if (!empty($fasilitasItem)) {
                    Fasilitas::create([
                        'id_destinasi' => $id_destinasi,
                        'fasilitas' => $fasilitasItem,
                    ]);
                }
            }
        }

        if (!empty($website_medsos)) {
            foreach ($website_medsos as $website) {
                if (!empty($website)) {
                    MediaSosial::create([
                        'id_destinasi' => $id_destinasi,
                        'website_medsos' => $website,
                    ]);
                }
            }
        }
    }

    // Show the form for editing the specified destinasi wisata
    public function edit($id)
    {
        $destinasiWisata = DestinasiWisata::findOrFail($id);
        $fasilitasList = Fasilitas::all();
        $website_medsosList = MediaSosial::all();

        // Fetch selected fasilitas and media sosial for this destinasi
        $selectedFasilitas = $destinasiWisata->fasilitas ? $destinasiWisata->fasilitas->pluck('id_destinasi')->toArray() : [];
        $selectedwebsite_medsos = $destinasiWisata->website_medsos ? $destinasiWisata->website_medsos->pluck('id_destinasi')->toArray() : [];

        return view('pages.edit', compact(
            'destinasiWisata',
            'fasilitasList',
            'selectedFasilitas',
            'website_medsosList',
            'selectedwebsite_medsos',
        ));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_destinasi' => 'required|string|max:255',
            'kabupaten_kota' => 'required|string|max:255',
            'harga_tiket' => 'required|numeric',
            'rating_destinasi' => 'nullable|numeric|min:0|max:5',
            'contact_person' => 'required|string|max:255',
            'alamat_lengkap' => 'required|string|max:255',
            'link_maps' => 'required|string|max:255',
            'jenis_wisata' => 'required|string|max:255',
            'reservasi' => 'required|string|max:255',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'foto_destinasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'fasilitas' => 'array',
            'website_medsos' => 'array',
        ]);

        $destinasiWisata = DestinasiWisata::findOrFail($id);
        $destinasiWisata->update($request->except(['fasilitas', 'website_medsos']));

        // Upload foto destinasi
        if ($request->hasFile('foto_destinasi')) {
            $filename = $request->file('foto_destinasi')->store('destinasi', 'public');
            $destinasiWisata->foto_destinasi = $filename;
        }

        $destinasiWisata->save();

        // Update related data (fasilitas and media sosial)
        $this->updateRelatedData($destinasiWisata->id_destinasi, $request->fasilitas, $request->website_medsos);

        return redirect()->route('pages.index')->with('success', 'Data berhasil diperbarui.');
    }

    private function updateRelatedData($id_destinasi, $fasilitas, $website_medsos)
    {
        // Update fasilitas
        Fasilitas::where('id_destinasi', $id_destinasi)->delete();
        if (!empty($fasilitas)) {
            foreach ($fasilitas as $fasilitasItem) {
                if (!empty($fasilitasItem)) {
                    Fasilitas::create([
                        'id_destinasi' => $id_destinasi,
                        'fasilitas' => $fasilitasItem,
                    ]);
                }
            }
        }

        // Update media sosial
        MediaSosial::where('id_destinasi', $id_destinasi)->delete();
        if (!empty($website_medsos)) {
            foreach ($website_medsos as $website) {
                if (!empty($website)) {
                    MediaSosial::create([
                        'id_destinasi' => $id_destinasi,
                        'website_medsos' => $website,
                    ]);
                }
            }
        }
    }

    // Remove the specified destinasi wisata from the database
    public function destroy(string $id_destinasi)
    {
        DestinasiWisata::destroy($id_destinasi);
        return redirect()->route('pages.index')->with('success', 'Data berhasil dihapus.');
    }
}