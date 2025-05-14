@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Tambah Kendaraan</h2>
        <a href="{{ route('vehicles.index') }}" class="btn btn-secondary mb-3">Kembali</a>

        <form action="{{ route('vehicles.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nup" class="form-label">NUP (Nomor Urut Pendaftaran)</label>
                <input type="number" name="nup" id="nup" class="form-control @error('nup') is-invalid @enderror"
                    value="{{ old('nup') }}" required>
                @error('nup')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">Jenis Kendaraan</label>
                <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="roda_dua" {{ old('type') == 'roda_dua' ? 'selected' : '' }}>Roda Dua</option>
                    <option value="roda_empat" {{ old('type') == 'roda_empat' ? 'selected' : '' }}>Roda Empat</option>
                </select>
                @error('type')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="brand" class="form-label">Merek Kendaraan</label>
                <input type="text" name="brand" id="brand"
                    class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand') }}" required>
                @error('brand')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="license_plate" class="form-label">Nomor Polisi</label>
                <input type="text" name="license_plate" id="license_plate"
                    class="form-control @error('license_plate') is-invalid @enderror" value="{{ old('license_plate') }}"
                    required>
                @error('license_plate')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="chassis_number" class="form-label">Nomor Rangka</label>
                <input type="text" name="chassis_number" id="chassis_number"
                    class="form-control @error('chassis_number') is-invalid @enderror" value="{{ old('chassis_number') }}"
                    required>
                @error('chassis_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="engine_number" class="form-label">Nomor Mesin</label>
                <input type="text" name="engine_number" id="engine_number"
                    class="form-control @error('engine_number') is-invalid @enderror" value="{{ old('engine_number') }}"
                    required>
                @error('engine_number')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="manufacture_year" class="form-label">Tahun Pembuatan</label>
                <input type="number" name="manufacture_year" id="manufacture_year"
                    class="form-control @error('manufacture_year') is-invalid @enderror"
                    value="{{ old('manufacture_year') }}" min="1900" max="{{ date('Y') }}" required>
                @error('manufacture_year')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="owner_name" class="form-label">Nama Pemilik</label>
                <input type="text" name="owner_name" id="owner_name"
                    class="form-control @error('owner_name') is-invalid @enderror" value="{{ old('owner_name') }}"
                    required>
                @error('owner_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tax_due_date" class="form-label">Tanggal Jatuh Tempo Pajak</label>
                <input type="date" name="tax_due_date" id="tax_due_date"
                    class="form-control @error('tax_due_date') is-invalid @enderror" value="{{ old('tax_due_date') }}"
                    required>
                @error('tax_due_date')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stnk_expired" class="form-label">Tanggal Kadaluarsa STNK</label>
                <input type="date" name="stnk_expired" id="stnk_expired"
                    class="form-control @error('stnk_expired') is-invalid @enderror" value="{{ old('stnk_expired') }}"
                    required>
                @error('stnk_expired')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status" class="form-label">Status Kendaraan</label>
                <select name="status" id="status" class="form-control @error('status') is-invalid @enderror"
                    required>
                    <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                    <option value="in_use" {{ old('status') == 'in_use' ? 'selected' : '' }}>Dipakai</option>
                    <option value="maintenance" {{ old('status') == 'maintenance' ? 'selected' : '' }}>Servis</option>
                </select>
                @error('status')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
