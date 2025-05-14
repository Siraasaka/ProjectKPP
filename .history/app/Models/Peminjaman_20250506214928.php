<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $fillable = [
        'kendaraan_id',
        'nama_peminjam',
        'nip',
        'pangkat_golongan',
        'jabatan',
        'unit_kerja',
        'alamat',
        'tanggal_pinjam',
        'tanggal_kembali',
        'keperluan',
        'status_peminjaman'
    ];

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
