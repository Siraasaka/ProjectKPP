<div class="modal fade" id="detailModal{{ $peminjaman->id }}" tabindex="-1" role="dialog"
    aria-labelledby="detailModalLabel{{ $peminjaman->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel{{ $peminjaman->id }}">Detail Peminjaman</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <dl class="row">
                    <dt class="col-sm-4">Nama Peminjam</dt>
                    <dd class="col-sm-8">{{ $peminjaman->nama_peminjam }}</dd>

                    <dt class="col-sm-4">Kendaraan</dt>
                    <dd class="col-sm-8">{{ $peminjaman->kendaraan->nama_kendaraan ?? '-' }}</dd>

                    <dt class="col-sm-4">Tanggal Pinjam</dt>
                    <dd class="col-sm-8">{{ $peminjaman->tanggal_pinjam }}</dd>

                    <dt class="col-sm-4">Tanggal Kembali</dt>
                    <dd class="col-sm-8">{{ $peminjaman->tanggal_kembali ?? '-' }}</dd>

                    <dt class="col-sm-4">Keperluan</dt>
                    <dd class="col-sm-8">{{ $peminjaman->keperluan }}</dd>

                    <dt class="col-sm-4">Status</dt>
                    <dd class="col-sm-8">
                        <span class="badge badge-{{ $peminjaman->status == 'Dipinjam' ? 'warning' : 'success' }}">
                            {{ $peminjaman->status }}
                        </span>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>
