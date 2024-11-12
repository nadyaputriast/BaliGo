<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi';
    protected $primaryKey = 'id_rekomendasi';
    protected $fillable = [
        'maks_budget',
        'kabupaten_kota',
        'banyak_tempat',
    ];

    public $timestamps = true;
}