<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    use HasFactory;

    protected $table = 'ulasan';
    protected $primaryKey = 'id_ulasan';
    protected $fillable = [
        'id_ulasan',
        'tanggal_ulasan',
        'isi_ulasan',
        'rating',
        'foto_ulasan',
        'id_user',
        'id_destinasi',
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function destinasi()
    {
        return $this->belongsTo(DestinasiWisata::class, 'id_destinasi');
    }
}