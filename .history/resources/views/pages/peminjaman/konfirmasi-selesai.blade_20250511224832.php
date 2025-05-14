<div class="modal fade" id="konfirmasiSelesaiModal{{ $p->id }}" tabindex="-1" role="dialog"
    aria-labelledby="selesaiModalLabel{{ $p->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="POST" action="{{ route('peminjaman.selesai', $p->id) }}">
            @csrf
            @method('PUT')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Konfirmasi Selesai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menyelesaikan peminjaman oleh <strong>{{ $p->nama_peminjam }}</strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Ya, Selesaikan</button>
                </div>
            </div>
        </form>
    </div>
</div>
