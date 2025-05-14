<div class="modal fade" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">

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

        <form action="{{ route('kendaraan.store') }}" method="POST">
            @csrf
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label>NUP</label>
                            <input type="number" name="nup" class="form-control @error('nup') is-invalid @enderror"
                                value="{{ old('nup') }}">
                            @error('nup')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 ">
                            <label>Jenis Kendaraan</label>
                            <select name="jenis_kendaraan"
                                class="form-control @error('jenis_kendaraan') is-invalid @enderror">
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

                        <div class="form-group col-md-6">
                            <label>Merek</label>
                            <input type="text" name="merek_kendaraan"
                                class="form-control @error('merek_kendaraan') is-invalid @enderror"
                                value="{{ old('merek_kendaraan') }}" placeholder="Contoh: Toyota, Honda" required>
                            @error('merek_kendaraan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Polisi</label>
                            <input type="text" name="nomor_polisi"
                                class="form-control @error('nomor_polisi') is-invalid @enderror"
                                value="{{ old('nomor_polisi') }}" placeholder="Contoh: B 1234 XYZ" required>
                            @error('nomor_polisi')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Rangka</label>
                            <input type="text" name="nomor_rangka"
                                class="form-control @error('nomor_rangka') is-invalid @enderror"
                                value="{{ old('nomor_rangka') }}" placeholder="Nomor Rangka Kendaraan" required>
                            @error('nomor_rangka')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Mesin</label>
                            <input type="text" name="nomor_mesin"
                                class="form-control @error('nomor_mesin') is-invalid @enderror"
                                value="{{ old('nomor_mesin') }}" placeholder="Nomor Mesin Kendaraan" required>
                            @error('nomor_mesin')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tahun Pembuatan</label>
                            <input type="number" name="tahun_pembuatan"
                                class="form-control @error('tahun_pembuatan') is-invalid @enderror"
                                value="{{ old('tahun_pembuatan') }}" min="1900" step="1"
                                placeholder="Contoh: 2020">
                            @error('tahun_pembuatan')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nama Pemilik</label>
                            <input type="text" name="nama_pemilik"
                                class="form-control @error('nama_pemilik') is-invalid @enderror"
                                value="{{ old('nama_pemilik') }}" placeholder="Pemilik Kendaraan">
                            @error('nama_pemilik')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pajak Jatuh Tempo</label>
                            <input type="date" name="pajak_jatuh_tempo" class="form-control">
                            <input type="date" name="pajak"
                                class="form-control @error('pajak') is-invalid @enderror" value="{{ old('pajak') }}">
                            @error('pajak')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label>STNK Kadaluarsa</label>
                            <input type="number" name="stnk_kadaluarsa" class="form-control"
                                placeholder="Contoh: 2020">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
