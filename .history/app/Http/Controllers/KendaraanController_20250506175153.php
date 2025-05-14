<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('pages.kendaraan.index', [
            'kendaraan' => $kendaraans,
        ]);
        return view('kendaraans.index', compact('kendaraans'));
    }

    public function create()
    {
        return view('pages.kendaraan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nup' => ['required', 'integer'],
            'jenis_kendaraan' => ['required', Rule::in(['roda_dua', 'roda_empat'])],
            'merek_kendaraan' => 'required|max:255',
            'nomor_polisi' => ['required', 'max:50'],
            'nomor_rangka' => ['required', 'max:100'],
            'nomor_mesin' => ['required', 'max:100'],
            'tahun_pembuatan' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'nama_pemilik' => ['required', 'max:255'],
            'pajak' => ['required', 'date'],
            'stnk' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'status_kendaraan' => ['nullable', Rule::in(['terpakai', 'tidak_terpakai', 'service'])],

            // // Kolom untuk peminjaman
            // 'nama_peminjam' => ['nullable', 'max:255'],
            // 'nip' => ['nullable', 'max:50'],
            // 'pangkat_gol' => ['nullable', 'max:100'],
            // 'jabatan' => ['nullable', 'max:255'],
            // 'unit_kerja' => ['nullable', 'max:255'],
            // 'alamat' => ['nullable', 'max:1000'],
            // 'tanggal_pinjam' => ['nullable', 'date'],
            // 'tanggal_kembali' => ['nullable', 'date'],
            // 'status_pinjam' => ['nullable', Rule::in(['dipinjam', 'selesai'])],
            // 'keperluan' => ['nullable', 'max:1000'],
        ], [
            'nup.required' => 'NUP wajib diisi dan harus berupa angka.',
            'nup.integer' => 'NUP harus berupa angka.',

            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib dipilih.',
            'jenis_kendaraan.in' => 'Jenis Kendaraan harus berupa Roda Dua atau Roda Empat.',

            'merek_kendaraan.required' => 'Merek Kendaraan wajib diisi.',
            'merek_kendaraan.max' => 'Merek Kendaraan maksimal 255 karakter.',

            'nomor_polisi.required' => 'Nomor Polisi wajib diisi.',
            'nomor_polisi.max' => 'Nomor Polisi maksimal 50 karakter.',

            'nomor_rangka.required' => 'Nomor Rangka wajib diisi.',
            'nomor_rangka.max' => 'Nomor Rangka maksimal 100 karakter.',

            'nomor_mesin.required' => 'Nomor Mesin wajib diisi.',
            'nomor_mesin.max' => 'Nomor Mesin maksimal 100 karakter.',

            'tahun_pembuatan.required' => 'Tahun Pembuatan wajib diisi.',
            'tahun_pembuatan.integer' => 'Tahun Pembuatan harus berupa angka.',
            'tahun_pembuatan.digits' => 'Tahun Pembuatan harus 4 digit.',
            'tahun_pembuatan.min' => 'Tahun Pembuatan minimal 1900.',
            'tahun_pembuatan.max' => 'Tahun Pembuatan tidak boleh lebih dari tahun sekarang.',

            'nama_pemilik.required' => 'Nama Pemilik wajib diisi.',
            'nama_pemilik.max' => 'Nama Pemilik maksimal 255 karakter.',

            'pajak.required' => 'Tanggal Pajak wajib diisi.',
            'pajak.date' => 'Tanggal Pajak harus dalam format tanggal yang benar.',

            'stnk.required' => 'Tahun STNK wajib diisi.',
            'stnk.integer' => 'Tahun STNK harus berupa angka.',
            'stnk.digits' => 'Tahun STNK harus 4 digit.',
            'stnk.min' => 'Tahun STNK minimal 1900.',
            'stnk.max' => 'Tahun STNK tidak boleh lebih dari tahun sekarang.',

            'status_kendaraan.in' => 'Status Kendaraan harus berupa salah satu dari: terpakai, tidak_terpakai, service.',

            // // Kolom Peminjaman
            // 'nama_peminjam.max' => 'Nama Peminjam maksimal 255 karakter.',
            // 'nip.max' => 'NIP maksimal 50 karakter.',
            // 'pangkat_gol.max' => 'Pangkat Golongan maksimal 100 karakter.',
            // 'jabatan.max' => 'Jabatan maksimal 255 karakter.',
            // 'unit_kerja.max' => 'Unit Kerja maksimal 255 karakter.',
            // 'alamat.max' => 'Alamat maksimal 1000 karakter.',
            // 'tanggal_pinjam.date' => 'Tanggal Pinjam harus dalam format tanggal yang benar.',
            // 'tanggal_kembali.date' => 'Tanggal Kembali harus dalam format tanggal yang benar.',
            // 'status_pinjam.in' => 'Status Peminjaman harus berupa salah satu dari: dipinjam, selesai.',
            // 'keperluan.max' => 'Keperluan maksimal 1000 karakter.',
        ]);

        Kendaraan::create($validatedData);

        return redirect('/kendaraan')->with('success', 'Berhasil menambahkan data kendaraan');
    }

    public function edit($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('pages.kendaraan.edit', [
            'kendaraan' => $kendaraan,
        ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nup' => ['required', 'integer'],
            'jenis_kendaraan' => ['required', Rule::in(['roda_dua', 'roda_empat'])],
            'merek_kendaraan' => 'required|max:255',
            'nomor_polisi' => ['required', 'max:50'],
            'nomor_rangka' => ['required', 'max:100'],
            'nomor_mesin' => ['required', 'max:100'],
            'tahun_pembuatan' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'nama_pemilik' => ['required', 'max:255'],
            'pajak' => ['required', 'date'],
            'stnk' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'status_kendaraan' => ['nullable', Rule::in(['terpakai', 'tidak_terpakai', 'service'])],

            // Kolom untuk peminjaman
            'nama_peminjam' => ['nullable', 'max:255'],
            'nip' => ['nullable', 'max:50'],
            'pangkat_gol' => ['nullable', 'max:100'],
            'jabatan' => ['nullable', 'max:255'],
            'unit_kerja' => ['nullable', 'max:255'],
            'alamat' => ['nullable', 'max:1000'],
            'tanggal_pinjam' => ['nullable', 'date'],
            'tanggal_kembali' => ['nullable', 'date'],
            'status_pinjam' => ['nullable', Rule::in(['dipinjam', 'selesai'])],
            'keperluan' => ['nullable', 'max:1000'],
        ], [
            'nup.required' => 'NUP wajib diisi dan harus berupa angka.',
            'nup.integer' => 'NUP harus berupa angka.',

            'jenis_kendaraan.required' => 'Jenis Kendaraan wajib dipilih.',
            'jenis_kendaraan.in' => 'Jenis Kendaraan harus berupa Roda Dua atau Roda Empat.',

            'merek_kendaraan.required' => 'Merek Kendaraan wajib diisi.',
            'merek_kendaraan.max' => 'Merek Kendaraan maksimal 255 karakter.',

            'nomor_polisi.required' => 'Nomor Polisi wajib diisi.',
            'nomor_polisi.max' => 'Nomor Polisi maksimal 50 karakter.',

            'nomor_rangka.required' => 'Nomor Rangka wajib diisi.',
            'nomor_rangka.max' => 'Nomor Rangka maksimal 100 karakter.',

            'nomor_mesin.required' => 'Nomor Mesin wajib diisi.',
            'nomor_mesin.max' => 'Nomor Mesin maksimal 100 karakter.',

            'tahun_pembuatan.required' => 'Tahun Pembuatan wajib diisi.',
            'tahun_pembuatan.integer' => 'Tahun Pembuatan harus berupa angka.',
            'tahun_pembuatan.digits' => 'Tahun Pembuatan harus 4 digit.',
            'tahun_pembuatan.min' => 'Tahun Pembuatan minimal 1900.',
            'tahun_pembuatan.max' => 'Tahun Pembuatan tidak boleh lebih dari tahun sekarang.',

            'nama_pemilik.required' => 'Nama Pemilik wajib diisi.',
            'nama_pemilik.max' => 'Nama Pemilik maksimal 255 karakter.',

            'pajak.required' => 'Tanggal Pajak wajib diisi.',
            'pajak.date' => 'Tanggal Pajak harus dalam format tanggal yang benar.',

            'stnk.required' => 'Tahun STNK wajib diisi.',
            'stnk.integer' => 'Tahun STNK harus berupa angka.',
            'stnk.digits' => 'Tahun STNK harus 4 digit.',
            'stnk.min' => 'Tahun STNK minimal 1900.',
            'stnk.max' => 'Tahun STNK tidak boleh lebih dari tahun sekarang.',

            'status_kendaraan.in' => 'Status Kendaraan harus berupa salah satu dari: terpakai, tidak_terpakai, service.',

            // Kolom Peminjaman
            'nama_peminjam.max' => 'Nama Peminjam maksimal 255 karakter.',
            'nip.max' => 'NIP maksimal 50 karakter.',
            'pangkat_gol.max' => 'Pangkat Golongan maksimal 100 karakter.',
            'jabatan.max' => 'Jabatan maksimal 255 karakter.',
            'unit_kerja.max' => 'Unit Kerja maksimal 255 karakter.',
            'alamat.max' => 'Alamat maksimal 1000 karakter.',
            'tanggal_pinjam.date' => 'Tanggal Pinjam harus dalam format tanggal yang benar.',
            'tanggal_kembali.date' => 'Tanggal Kembali harus dalam format tanggal yang benar.',
            'status_pinjam.in' => 'Status Peminjaman harus berupa salah satu dari: dipinjam, selesai.',
            'keperluan.max' => 'Keperluan maksimal 1000 karakter.',
        ]);

        Kendaraan::findOrFail($id)->update($validatedData);

        return redirect('/kendaraan')->with('success', 'Berhasil mengubah data kendaraan');
    }

    public function destroy($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);
        $kendaraan->delete();

        return redirect('/kendaraan')->with('success', 'Berhasil menghapus data');
    }

    public function dashboard()
    {
        $kendaraan = Kendaraan::all();
        return view('pages.dashboard', [
            'kendaraan' => $kendaraan,
        ]);
    }

    public function showPinjamForm($id)
    {
        $kendaraan = Kendaraan::findOrFail($id);

        return view('pages.kendaraan.peminjaman', [
            'kendaraan' => $kendaraan,
        ]);
    }

    public function pinjam(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama_peminjam' => ['required', 'max:255'],
            'nip' => ['required', 'max:50'],
            'pangkat_gol' => ['required', 'max:100'],
            'jabatan' => ['required', 'max:255'],
            'unit_kerja' => ['required', 'max:255'],
            'alamat' => ['required', 'max:1000'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_kembali' => ['required', 'date'],
            // 'status_pinjam' => ['required', Rule::in(['dipinjam', 'selesai'])],
            'keperluan' => ['required', 'max:1000'],
        ], [
            'nama_peminjam.required' => 'Nama Peminjam wajib diisi.',
            'nama_peminjam.max' => 'Nama Peminjam maksimal 255 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.max' => 'NIP maksimal 50 karakter.',

            'pangkat_gol' => 'Pangkat Golongan wajib diisi.',
            'pangkat_gol.max' => 'Pangkat Golongan maksimal 100 karakter.',

            'jabatan.required' => 'Jabatan Golongan wajib diisi.',
            'jabatan.max' => 'Jabatan maksimal 255 karakter.',

            'unit_kerja.required' => 'Unit Kerja wajib diisi.',
            'unit_kerja.max' => 'Unit Kerja maksimal 255 karakter.',

            'alamat.required' => 'Alamat  wajib diisi.',
            'alamat.max' => 'Alamat maksimal 1000 karakter.',

            'tanggal_pinjam.required' => 'Tanggal Pinjam wajib diisi.',
            'tanggal_pinjam.date' => 'Tanggal Pinjam harus dalam format tanggal yang benar.',

            'tanggal_kembali.required' => 'Tanggal Kembali wajib diisi.',
            'tanggal_kembali.date' => 'Tanggal Kembali harus dalam format tanggal yang benar.',
            // 'status_pinjam.in' => 'Status Peminjaman harus berupa salah satu dari: dipinjam, selesai.',

            'keperluan.required' => 'Keperluan wajib diisi.',
            'keperluan.max' => 'Keperluan maksimal 1000 karakter.',
        ]);

        // Ambil data kendaraan berdasarkan ID
        $kendaraan = Kendaraan::findOrFail($id);

        // Cek apakah kendaraan sudah dalam status terpakai
        if ($kendaraan->status_kendaraan === 'terpakai') {
            return redirect('/kendaraan')->with('error', 'Kendaraan sudah dipinjam.');
        }

        // Simpan data peminjaman (asumsi kamu sudah menambahkan kolom terkait di database)
        $kendaraan->update($validatedData);

        // Perbarui status kendaraan menjadi 'terpakai' (dipinjam)
        $kendaraan->status_kendaraan = 'terpakai';
        $kendaraan->save();

        return redirect('/kendaraan')->with('success', 'Peminjaman berhasil');
    }
}
