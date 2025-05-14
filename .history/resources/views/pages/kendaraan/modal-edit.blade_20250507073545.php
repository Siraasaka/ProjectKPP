<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form method="POST">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Kendaraan</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>NUP</label>
                        <input type="text" name="nup" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jenis Kendaraan</label>
                        <select name="jenis_kendaraan" class="form-control">
                            <option value="roda_dua">Roda Dua</option>
                            <option value="roda_empat">Roda Empat</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Merek</label>
                        <input type="text" name="merek_kendaraan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No. Polisi</label>
                        <input type="text" name="nomor_polisi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tahun Pembuatan</label>
                        <input type="number" name="tahun_pembuatan" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pajak Jatuh Tempo</label>
                        <input type="date" name="pajak_jatuh_tempo" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>STNK Kadaluarsa</label>
                        <input type="date" name="stnk_kadaluarsa" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </div>
        </form>
    </div>
</div>
