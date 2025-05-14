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

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'nullable|date|after:tanggal_pinjam'
        ]);

        $peminjaman = Peminjaman::create($request->only(['tanggal_pinjam', 'kendaraan_id']));

        $kendaraan = Kendaraan::find($request->kendaraan_id);
        if (!$kendaraan) {
            return redirect()->back()->withErrors(['kendaraan_id' => 'Kendaraan tidak ditemukan']);
        }
        $kendaraan->status_kendaraan = 'terpakai';
        $kendaraan->save();

        return redirect()->route('peminjaman.index');
    }
}
