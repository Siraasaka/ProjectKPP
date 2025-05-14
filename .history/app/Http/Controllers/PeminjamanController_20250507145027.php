<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $kendaraans = Peminjaman::all();
        return view('pages.kendaraan.index', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'nama_peminjam' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam'
        ]);

        Peminjaman::create($request->all());

        Kendaraan::where('id', $request->kendaraan_id)->update(['status_kendaraan' => 'terpakai']);

        return back()->with('success', 'Peminjaman berhasil dicatat');
    }

    public function selesai($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->update(['status' => 'selesai']);

        Kendaraan::where('id', $peminjaman->kendaraan_id)->update(['status_kendaraan' => 'tersedia']);

        return back()->with('success', 'Peminjaman diselesaikan');
    }

    public function riwayat()
    {
        $peminjamans = Peminjaman::with('kendaraan')->latest()->get();
        return view('peminjaman.riwayat', compact('peminjamans'));
    }
}
