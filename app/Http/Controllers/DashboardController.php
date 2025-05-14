<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $total = Kendaraan::count();
        $tersedia = Kendaraan::where('status_kendaraan', 'tersedia')->count();
        $terpakai = Kendaraan::where('status_kendaraan', 'terpakai')->count();
        $service = Kendaraan::where('status_kendaraan', 'service')->count();

        // Ambil peminjaman yang masih aktif (status: dipinjam)
        $peminjaman_terakhir = Peminjaman::where('status_pinjam', 'dipinjam')
            ->with('kendaraan')
            ->latest()
            ->take(5)
            ->get();

        // Ambil semua kendaraan untuk modal form peminjaman
        $kendaraan = Kendaraan::all();

        return view('pages.dashboard', compact(
            'total',
            'tersedia',
            'terpakai',
            'service',
            'peminjaman_terakhir',
            'kendaraan'
        ));
    }
}
