<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peminjaman extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'nama_peminjam',
        'nip',
        'pangkat',
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
