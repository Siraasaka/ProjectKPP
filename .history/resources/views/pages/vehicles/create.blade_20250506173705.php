@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Kendaraan</h2>
        <a href="{{ route('kendaraans.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <form action="{{ route('kendaraans.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nup" class="form-label">NUP</label>
                <input type="number" name="nup" id="nup" class="form-control @error('nup') is-invalid @enderror"
                    value="{{ old('nup') }}" required>
                @error('nup')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jenis_kendaraan" class="form-label">Jenis Kendaraan</label>
                <select name="jenis_kendaraan" id="jenis_kendaraan"
                    class="form-control @error('jenis_kendaraan') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="roda_dua" {{ old('jenis_kendaraan') == 'roda_dua' ? 'selected' : '' }}>Roda Dua</option>
                    <option value="roda_empat" {{ old('jenis_kendaraan') == 'roda_empat' ? 'selected' : '' }}>Roda Empat
                    </option>
                </select>
                @error('jenis_kendaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="merek_kendaraan" class="form-label">Merek Kendaraan</label>
                <input type="text" name="merek_kendaraan" id="merek_kendaraan"
                    class="form-control @error('merek_kendaraan') is-invalid @enderror" value="{{ old('merek_kendaraan') }}"
                    required>
                @error('merek_kendaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_polisi" class="form-label">Nomor Polisi</label>
                <input type="text" name="nomor_polisi" id="nomor_polisi"
                    class="form-control @error('nomor_polisi') is-invalid @enderror" value="{{ old('nomor_polisi') }}"
                    required>
                @error('nomor_polisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_rangka" class="form-label">Nomor Rangka</label>
                <input type="text" name="nomor_rangka" id="nomor_rangka"
                    class="form-control @error('nomor_rangka') is-invalid @enderror" value="{{ old('nomor_rangka') }}"
                    required>
                @error('nomor_rangka')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nomor_mesin" class="form-label">Nomor Mesin</label>
                <input type="text" name="nomor_mesin" id="nomor_mesin"
                    class="form-control @error('nomor_mesin') is-invalid @enderror" value="{{ old('nomor_mesin') }}"
                    required>
                @error('nomor_mesin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tahun_pembuatan" class="form-label">Tahun Pembuatan</label>
                <input type="number" name="tahun_pembuatan" id="tahun_pembuatan"
                    class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                    value="{{ old('tahun_pembuatan') }}" min="1900" max="{{ date('Y') }}" required>
                @error('tahun_pembuatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
                <input type="text" name="nama_pemilik" id="nama_pemilik"
                    class="form-control @error('nama_pemilik') is-invalid @enderror" value="{{ old('nama_pemilik') }}"
                    required>
                @error('nama_pemilik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="pajak" class="form-label">Tanggal Jatuh Tempo Pajak</label>
                <input type="date" name="pajak" id="pajak"
                    class="form-control @error('pajak') is-invalid @enderror" value="{{ old('pajak') }}" required>
                @error('pajak')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stnk" class="form-label">Tahun Kadaluarsa STNK</label>
                <input type="number" name="stnk" id="stnk" class="form-control @error('stnk') is-invalid @enderror"
                    value="{{ old('stnk') }}" min="1900" max="{{ date('Y') + 5 }}" required>
                @error('stnk')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status_kendaraan" class="form-label">Status Kendaraan</label>
                <select name="status_kendaraan" id="status_kendaraan"
                    class="form-control @error('status_kendaraan') is-invalid @enderror" required>
                    <option value="tidak_terpakai" {{ old('status_kendaraan') == 'tidak_terpakai' ? 'selected' : '' }}>
                        Tidak Terpakai</option>
                    <option value="terpakai" {{ old('status_kendaraan') == 'terpakai' ? 'selected' : '' }}>Terpakai
                    </option>
                    <option value="service" {{ old('status_kendaraan') == 'service' ? 'selected' : '' }}>Service</option>
                </select>
                @error('status_kendaraan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
