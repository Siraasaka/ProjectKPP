<!-- Modal Detail Peminjaman -->
@foreach ($peminjaman as $p)
    <div class="modal fade" id="detailModal{{ $p->id }}" tabindex="-1" role="dialog"
        aria-labelledby="detailModalLabel{{ $p->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">Detail Peminjaman</h5>
                    <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Nama Peminjam</dt>
                        <dd class="col-sm-8">{{ $p->nama_peminjam }}</dd>

                        <dt class="col-sm-4">Kendaraan</dt>
                        <dd class="col-sm-8">{{ $p->kendaraan->merek_kendaraan }} - {{ $p->kendaraan->nomor_polisi }}
                        </dd>

                        <dt class="col-sm-4">Tanggal Pinjam</dt>
                        <dd class="col-sm-8">{{ $p->tanggal_pinjam }} - {{ $p->tanggal_kembali }}</dd>

                        <dt class="col-sm-4">Status</dt>
                        <dd class="col-sm-8">
                            @if ($p->status_peminjaman == 'dipinjam')
                                <span class="badge badge-warning">Dipinjam</span>
                            @else
                                <span class="badge badge-success">Selesai</span>
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endforeach
