<?php

namespace App\Exports;

use App\Models\Kendaraan;
use Maatwebsite\Excel\Concerns\FromCollection;

class KendaraanExport implements FromCollection
{
    public function collection()
    {
        return Kendaraan::all(); // Ambil semua data kendaraan
    }
}
