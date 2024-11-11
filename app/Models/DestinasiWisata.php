<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DestinasiWisata extends Model
{
    use HasFactory;

    protected $table = 'destinasi_wisata';
    protected $primaryKey = 'id_destinasi';
    protected $fillable = [
        'nama_destinasi',
        'kabupaten_kota',
        'harga_tiket',
        'rating_destinasi',
        'contact_person',
        'alamat_lengkap',
        'link_maps',
        'jenis_wisata',
        'reservasi',
        'jam_buka',
        'jam_tutup',
        'foto_destinasi',
    ];

    public $timestamps = false;

    public static function getKabupatenKotaOptions()
    {
        $type = DB::select('SHOW COLUMNS FROM destinasi_wisata WHERE Field = "kabupaten_kota"')[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enumValues = [];

        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }

        return $enumValues;
    }

    public static function getJenisWisataOptions()
    {
        $type = DB::select('SHOW COLUMNS FROM destinasi_wisata WHERE Field = "jenis_wisata"')[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $enumValues = [];

        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }

        return $enumValues;
    }
    public function website_medsos()
    {
        return $this->hasMany(MediaSosial::class, 'id_destinasi');
    }

    public function fasilitas()
    {
        return $this->hasMany(Fasilitas::class, 'id_destinasi');
    }
}
