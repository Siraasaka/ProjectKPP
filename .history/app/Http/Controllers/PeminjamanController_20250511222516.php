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
        $validatedData = $request->validate([
            'kendaraan_id' => 'required',
            'nama_peminjam' => ['required', 'max:255'],
            'nip' => ['required', 'max:50'],
            'pangkat' => ['required', 'max:100'],
            'jabatan' => ['required', 'max:255'],
            'unit_kerja' => ['required', 'max:255'],
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
            'alamat' => ['required'],
            'keperluan' => ['required']
            // 'status_pinjam' => ['required', Rule::in(['dipinjam', 'selesai'])],

        ], [
            'kendaraan_id.required' => 'Kendaraan wajib dipilih.',

            'nama_peminjam.required' => 'Nama peminjam tidak boleh kosong.',
            'nama_peminjam.max' => 'Nama peminjam maksimal 255 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.max' => 'NIP maksimal 50 karakter.',

            'pangkat.required' => 'Pangkat wajib diisi.',
            'pangkat.max' => 'Pangkat maksimal 100 karakter.',

            'jabatan.required' => 'Jabatan wajib diisi.',
            'jabatan.max' => 'Jabatan maksimal 255 karakter.',

            'unit_kerja.required' => 'Unit kerja wajib diisi.',
            'unit_kerja.max' => 'Unit kerja maksimal 255 karakter.',

            'tanggal_pinjam.required' => 'Tanggal pinjam wajib diisi.',
            'tanggal_pinjam.date' => 'Format tanggal pinjam tidak valid.',

            'tanggal_kembali.required' => 'Tanggal kembali wajib diisi.',
            'tanggal_kembali.date' => 'Format tanggal kembali tidak valid.',
            'tanggal_kembali.after_or_equal' => 'Tanggal kembali harus sama atau setelah tanggal pinjam.',

            'alamat.required' => 'Alamat wajib diisi.',

            'keperluan.required' => 'Keperluan wajib diisi.'
        ]);

        $validatedData['status_pinjam'] = 'dipinjam'; // tambahkan status

        $peminjaman = Peminjaman::create($validatedData);

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
