<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'kendaraan_id',
        'tanggal_jadwal',
        'tanggal_selesai',
        'catatan',
        'status_service',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Kendaraan::class);
    }
}
