<div class="modal fade" id="createModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document"> {{-- modal lebih lebar --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('kendaraan.store') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kendaraan Baru</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Jenis Kendaraan</label>
                            <select name="jenis_kendaraan" class="form-control" required>
                                <option value="">Pilih jenis</option>
                                <option value="roda_dua">Roda Dua</option>
                                <option value="roda_empat">Roda Empat</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Merek</label>
                            <input type="text" name="merek_kendaraan" class="form-control"
                                placeholder="Contoh: Toyota, Honda">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control"
                                placeholder="Contoh: Avanza, Vario">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tahun</label>
                            <input type="number" name="tahun_pembuatan" class="form-control"
                                placeholder="Contoh: 2020">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Polisi</label>
                            <input type="text" name="nomor_polisi" class="form-control"
                                placeholder="Contoh: B 1234 XYZ">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Nomor Rangka</label>
                            <input type="text" name="nomor_rangka" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Nomor Mesin</label>
                            <input type="text" name="nomor_mesin" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Warna</label>
                            <input type="text" name="warna" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label>Kapasitas</label>
                            <input type="number" name="kapasitas" class="form-control" placeholder="Jumlah penumpang">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Pembelian</label>
                            <input type="date" name="tanggal_pembelian" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label>Keterangan</label>
                            <textarea name="keterangan" class="form-control" rows="2"></textarea>
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
