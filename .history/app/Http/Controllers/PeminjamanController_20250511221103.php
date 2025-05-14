<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $kendaraan = Kendaraan::all();
        $peminjaman = Peminjaman::all();
        return view('pages.peminjaman.index', compact('kendaraan', 'peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kendaraan_id' => 'required',
            'nama_peminjam' => 'required',
            // 'nama_peminjam' => ['nullable', 'max:255'],
            // 'nip' => ['nullable', 'max:50'],
            // 'pangkat' => ['nullable', 'max:100'],
            // 'jabatan' => ['nullable', 'max:255'],
            // 'unit_kerja' => ['nullable', 'max:255'],
            // 'alamat' => ['nullable', 'max:1000'],
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam'
            // 'keperluan' => ['nullable', 'max:1000'],
            // 'status_pinjam' => ['nullable', Rule::in(['dipinjam', 'selesai'])],

            // 'nama_peminjam.max' => 'Nama Peminjam maksimal 255 karakter.',
            // 'nip.max' => 'NIP maksimal 50 karakter.',
            // 'pangkat.max' => 'Pangkat Golongan maksimal 100 karakter.',
            // 'jabatan.max' => 'Jabatan maksimal 255 karakter.',
            // 'unit_kerja.max' => 'Unit Kerja maksimal 255 karakter.',
            // 'alamat.max' => 'Alamat maksimal 1000 karakter.',
            // 'tanggal_pinjam.date' => 'Tanggal Pinjam harus dalam format tanggal yang benar.',
            // 'tanggal_kembali.date' => 'Tanggal Kembali harus dalam format tanggal yang benar.',
            // 'status_pinjam.in' => 'Status Peminjaman harus berupa salah satu dari: dipinjam, selesai.',
            // 'keperluan.max' => 'Keperluan maksimal 1000 karakter.',
        ]);

        Peminjaman::create($request->all());

        Peminjaman::where('id', $request->status_pinjam)->update(['status_pinjam' => 'dipinjam']);

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
        $peminjaman = Peminjaman::with('kendaraan')->latest()->get();
        return view('peminjaman.riwayat', compact('peminjaman'));
    }
}
