<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $total = Kendaraan::count();
        $tersedia = Kendaraan::where('status_kendaraan', 'tersedia')->count();
        $terpakai = Kendaraan::where('status_kendaraan', 'terpakai')->count();
        $service = Kendaraan::where('status_kendaraan', 'service')->count();
        $peminjaman_terakhir = Peminjaman::latest()->take(5)->get();
        $jadwal_service = Service::whereBetween('tanggal_servis', [now(), now()->addDays(14)])
            ->with('kendaraan')->get();

        return view('pages.dashboard', compact(
            'total',
            'tersedia',
            'terpakai',
            'service',
            'peminjaman_terakhir',
            'jadwal_service'
        ));
    }
}
