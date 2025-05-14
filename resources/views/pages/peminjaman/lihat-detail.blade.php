<div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1" role="dialog"
    aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Detail Peminjaman</h5>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="kendaraan_id">Kendaraan</label>
                        <input type="text" class="form-control"
                            value="{{ $p->kendaraan->merek_kendaraan }} - {{ $p->kendaraan->nomor_polisi }}" readonly>
                    </div>

                    <div class="form-group col-md-6">
                        <label>Nama Peminjam</label>
                        <input type="text" class="form-control" value="{{ $p->nama_peminjam }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>NIP</label>
                        <input type="text" class="form-control" value="{{ $p->nip }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Pangkat/Golongan</label>
                        <input type="text" class="form-control" value="{{ $p->pangkat }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" value="{{ $p->jabatan }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Unit Kerja</label>
                        <input type="text" class="form-control" value="{{ $p->unit_kerja }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Pinjam</label>
                        <input type="date" class="form-control" value="{{ $p->tanggal_pinjam }}" readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Kembali</label>
                        <input type="date" class="form-control" value="{{ $p->tanggal_kembali }}" readonly>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Alamat</label>
                        <textarea class="form-control" readonly>{{ $p->alamat }}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Keperluan</label>
                        <textarea class="form-control" readonly>{{ $p->keperluan }}</textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
