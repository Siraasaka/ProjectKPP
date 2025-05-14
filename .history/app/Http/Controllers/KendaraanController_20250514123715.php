<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\KendaraanExport;
use Barryvdh\DomPDF\Facade\Pdf as PDF;


class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::all();
        return view('pages.kendaraan.index', compact('kendaraans'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nup' => ['required', 'integer', 'unique:kendaraans,nup'],
            'jenis_kendaraan' => ['required', Rule::in(['roda_dua', 'roda_empat'])],
            'merek_kendaraan' => 'required|max:255',
            'nomor_polisi' => ['required', 'max:50'],
            'nomor_rangka' => ['required', 'max:100'],
            'nomor_mesin' => ['required', 'max:100'],
            'tahun_pembuatan' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'nama_pemilik' => ['required', 'max:255'],
            'pajak_jatuh_tempo' => ['required', 'date'],
            'stnk_kadaluarsa' => ['required', 'integer', 'digits:4', 'min:' . date('Y')],
        ], [
            'nup.required' => 'NUP wajib diisi dan harus berupa angka.',
            'nup.integer' => 'NUP harus berupa angka.',
            'nup.unique' => 'NUP sudah terdaftar. Silakan masukkan NUP yang berbeda.',

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

            'pajak_jatuh_tempo.required' => 'Tanggal Pajak wajib diisi.',
            'pajak_jatuh_tempo.date' => 'Tanggal Pajak harus dalam format tanggal yang benar.',

            'stnk_kadaluarsa.required' => 'Tahun STNK wajib diisi.',
            'stnk_kadaluarsa.integer' => 'Tahun STNK harus berupa angka.',
            'stnk_kadaluarsa.digits' => 'Tahun STNK harus 4 digit.',
            'stnk_kadaluarsa.min' => 'Tahun Kadaluaraa STNK tidak boleh sebelum tahun sekarang.',

            'status_kendaraan.in' => 'Status Kendaraan harus berupa salah satu dari: terpakai, tidak_terpakai, service.',
        ]);

        Kendaraan::create($validatedData);

        return redirect('/kendaraan')->with('success', 'Berhasil menambahkan data kendaraan');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'jenis_kendaraan' => ['required', Rule::in(['roda_dua', 'roda_empat'])],
            'merek_kendaraan' => 'required|max:255',
            'nomor_polisi' => ['required', 'max:50'],
            'nomor_rangka' => ['required', 'max:100'],
            'nomor_mesin' => ['required', 'max:100'],
            'tahun_pembuatan' => ['required', 'integer', 'digits:4', 'min:1900', 'max:' . date('Y')],
            'nama_pemilik' => ['required', 'max:255'],
            'pajak_jatuh_tempo' => ['required', 'date'],
            'stnk_kadaluarsa' => ['required', 'integer', 'digits:4', 'min:' . date('Y')],
            'status_kendaraan' => ['nullable', Rule::in(['terpakai', 'tidak_terpakai', 'service'])],
        ], [
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

            'pajak_jatuh_tempo.required' => 'Tanggal Pajak wajib diisi.',
            'pajak_jatuh_tempo.date' => 'Tanggal Pajak harus dalam format tanggal yang benar.',

            'stnk_kadaluarsa.required' => 'Tahun STNK wajib diisi.',
            'stnk_kadaluarsa.integer' => 'Tahun STNK harus berupa angka.',
            'stnk_kadaluarsa.digits' => 'Tahun STNK harus 4 digit.',
            'stnk_kadaluarsa.min' => 'Tahun Kadaluaraa STNK tidak boleh sebelum tahun sekarang.',

            'status_kendaraan.in' => 'Status Kendaraan harus berupa salah satu dari: terpakai, tidak_terpakai, service.',
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

    public function export($format)
    {
        if (!in_array($format, ['pdf', 'excel'])) {
            return redirect()->back()->with('error', 'Format tidak didukung');
        }

        $data = Kendaraan::all();
        if ($format == 'excel') {
            return Excel::download(new KendaraanExport(), 'data_kendaraan.xlsx');
        }

        if ($format == 'pdf') {
            $pdf = PDF::loadView('pages.kendaraan.export_pdf', ['data' => $data]);
            return $pdf->download('data_kendaraan.pdf');
        }
    }
}
