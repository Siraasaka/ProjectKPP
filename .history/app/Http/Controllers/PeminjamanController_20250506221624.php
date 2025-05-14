<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kendaraan;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function create()
    {
        $kendaraans = Kendaraan::where('status_kendaraan', 'tersedia')->get();
        return view('peminjaman.create', compact('kendaraans'));
    }

    // Di PeminjamanController.php
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            // Validasi lain...
        ]);

        // Pastikan foreign key sesuai dengan migrasi (kendaraan_id)
        $peminjaman = Peminjaman::create($request->all());

        $kendaraan = Kendaraan::find($request->kendaraan_id);
        $kendaraan->status_kendaraan = 'terpakai';
        $kendaraan->save();

        return redirect()->route('peminjaman.index');
    }
}
