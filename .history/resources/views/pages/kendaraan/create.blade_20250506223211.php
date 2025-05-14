@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Kendaraan</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Ups!</strong> Data kendaraan belum lengkap:
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/kendaraan" method="POST">
        @csrf
        @method('POST')
        <div class="card">
            <div class="card-body">
                <div class="form-group mb-3">
                    <label>NUP</label>
                    <input type="number" name="nup" class="form-control @error('nup') is-invalid @enderror"
                        value="{{ old('nup') }}">
                    @error('nup')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Merek Kendaraan</label>
                    <input type="text" name="merek_kendaraan"
                        class="form-control @error('merek_kendaraan') is-invalid @enderror"
                        value="{{ old('merek_kendaraan') }}">
                    @error('merek_kendaraan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Jenis Kendaraan</label>
                    <select name="jenis_kendaraan" class="form-control @error('jenis_kendaraan') is-invalid @enderror">
                        @foreach ([(object) ['label' => 'Roda Dua', 'value' => 'roda_dua'], (object) ['label' => 'Roda Empat', 'value' => 'roda_empat']] as $item)
                            <option value="{{ $item->value }}" @selected(old('jenis_kendaraan') == $item->value)>
                                {{ $item->label }}
                            </option>
                        @endforeach
                    </select>
                    @error('jenis_kendaraan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nomor Polisi</label>
                    <input type="text" name="nomor_polisi"
                        class="form-control @error('nomor_polisi') is-invalid @enderror" value="{{ old('nomor_polisi') }}">
                    @error('nomor_polisi')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>


                <div class="form-group mb-3">
                    <label>Nomor Rangka</label>
                    <input type="text" name="nomor_rangka"
                        class="form-control @error('nomor_rangka') is-invalid @enderror" value="{{ old('nomor_rangka') }}">
                    @error('nomor_rangka')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nomor Mesin</label>
                    <input type="text" name="nomor_mesin" class="form-control @error('nomor_mesin') is-invalid @enderror"
                        value="{{ old('nomor_mesin') }}">
                    @error('nomor_mesin')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Tahun Pembuatan</label>
                    <input type="number" name="tahun_pembuatan"
                        class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                        value="{{ old('tahun_pembuatan') }}" min="1900" max="2099" step="1">
                    @error('tahun_pembuatan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Nama Pemilik</label>
                    <input type="text" name="nama_pemilik"
                        class="form-control @error('nama_pemilik') is-invalid @enderror" value="{{ old('nama_pemilik') }}">
                    @error('nama_pemilik')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>Pajak</label>
                    <input type="date" name="pajak_jatuh_tempo"
                        class="form-control @error('pajak_jatuh_tempo') is-invalid @enderror"
                        value="{{ old('pajak_jatuh_tempo') }}">
                    @error('pajak_jatuh_tempo')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label>STNK (Tahun)</label>
                    <input type="number" name="stnk" class="form-control @error('stnk') is-invalid @enderror"
                        value="{{ old('stnk') }}" min="1900" max="2099" step="1">
                    @error('stnk')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="form-group mb-3">
                    <label>Status Kendaraan</label>
                    <select name="status_kendaraan" class="form-control @error('status_kendaraan') is-invalid @enderror">
                        @foreach (['terpakai' => 'Terpakai', 'tidak_terpakai' => 'Tidak Terpakai', 'service' => 'Service'] as $value => $label)
                            <option value="{{ $value }}" @selected(old('status_kendaraan') == $value)>
                                {{ $label }}
                            </option>
                        @endforeach
                    </select>
                    @error('status_kendaraan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div> --}}

            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end" style="gap:10px;">
                    <a href="/kendaraan" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection
