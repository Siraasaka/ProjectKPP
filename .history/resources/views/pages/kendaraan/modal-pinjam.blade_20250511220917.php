<div class="modal fade" id="pinjamModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kendaraan_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Form Peminjaman</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Nama Peminjam</label>
                            <input type="text" name="nama_peminjam" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>NIP</label>
                            <input type="text" name="nip" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Pangkat/Golongan</label>
                            <input type="text" name="pangkat" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Unit Kerja</label>
                            <input type="text" name="unit_kerja" class="form-control">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Pinjam</label>
                            <input type="date" name="tanggal_pinjam" class="form-control" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Tanggal Kembali</label>
                            <input type="date" name="tanggal_kembali" class="form-control" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Keperluan</label>
                            <textarea name="keperluan" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Pinjam</button>
                </div>
            </div>
        </form>
    </div>
</div>
