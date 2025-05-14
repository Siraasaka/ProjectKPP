<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Export Data Kendaraan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <p>Pilih format export data:</p>
                <a href="{{ route('kendaraan.export', 'pdf') }}" class="btn btn-danger m-2">
                    <i class="fas fa-file-pdf"></i> PDF
                </a>
                <a href="{{ route('kendaraan.export', 'excel') }}" class="btn btn-success m-2">
                    <i class="fas fa-file-excel"></i> Excel
                </a>
            </div>
        </div>
    </div>
</div>
