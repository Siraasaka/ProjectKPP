<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kendaraan extends Model
{
    use HasFactory;

    protected $table = 'vehicles'; // Pastikan nama tabel sesuai
    protected $fillable = [
        'nup',
        'jenis_kendaraan',
        'merek_kendaraan',
        'nomor_polisi',
        'nomor_rangka',
        'nomor_mesin',
        'tahun_pembuatan',
        'nama_pemilik',
        'pajak',
        'stnk',
        'status_kendaraan'
    ];

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
}
