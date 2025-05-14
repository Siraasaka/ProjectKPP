<!-- Modal -->
<div class="modal fade" id="konfirmasiHapus{{ $item->id }}" tabindex="-1" aria-labelledby="konfirmasiHapusLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="konfirmasiHapusLabel">Konfirmasi Hapus</h4>
                <button type="button" class="btn btn-default" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin akan menghapus data kendaraan <strong>{{ $item->merek_kendaraan }}</strong>?
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                {{-- <button type="submit" class="btn btn-outline-danger">Ya, hapus!</button> --}}
                <form action="{{ route('kendaraan.destroy', $item->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>

    </div>
</div>
