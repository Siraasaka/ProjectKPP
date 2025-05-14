@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Peminjaman</h1>
        <div class="flex gap-2">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Peminjaman Baru</a>
        </div>
    </div>

    {{-- Table --}}
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kendaraan</th>
                    <th>Peminjam</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            @if ($peminjaman->isEmpty())
                <tbody>
                    <tr>
                        <td colspan="7 ">
                            <p>Tidak ada Data</p>
                        </td>
                    </tr>
                </tbody>
            @else
                <tbody>
                    @foreach ($peminjaman as $p)
                        <tr>

                            <td>{{ $p->id }}</td>
                            <td>{{ $p->kendaraan->merek_kendaraan }} - {{ $p->kendaraan->nomor_polisi }}</td>
                            <td>{{ $p->nama_peminjam }}</td>
                            <td>{{ $p->tanggal_pinjam }} - {{ $p->tanggal_kembali }}</td>
                            <td>
                                @if ($p->status_peminjaman == 'dipinjam')
                                    <span class="status in-use">Dipinjam</span>
                                @else
                                    <span class="status service">Selesai</span>
                                @endif
                            </td>

                            {{-- bagian aksi --}}
                            <td class="btn-aksi d-flex align-items-center">
                                <button class="btn btn-sm btn-warning mr-1" data-toggle="modal" data-target="#editModal"
                                    data-id="{{ $p->id }}" data-nup="{{ $p->nup }}"
                                    data-jenis="{{ $p->jenis_kendaraan }}" data-merek="{{ $p->merek_kendaraan }}"
                                    data-nopol="{{ $p->nomor_polisi }}" data-rangka="{{ $p->nomor_rangka }}"
                                    data-mesin="{{ $p->nomor_mesin }}" data-pembuatan="{{ $p->tahun_pembuatan }}"
                                    data-pemilik="{{ $p->nama_pemilik }}" data-pajak="{{ $p->pajak_jatuh_tempo }}"
                                    data-stnk="{{ $p->stnk_kadaluarsa }}">
                                    <i class="fas fa-pen"></i>
                                </button>

                                <button type="button" class="btn btn-sm btn-danger mr-1" data-bs-toggle="modal"
                                    data-bs-target="#konfirmasiHapus{{ $p->id }}">
                                    <i class="fas fa-trash"></i>
                                </button>

                                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#pinjamModal"
                                    data-id="{{ $p->id }}">
                                    <i class="fas fa-calendar-check"></i>
                                </button>
                            </td>
                        </tr>
                        @include('pages.kendaraan.konfirmasi-hapus')
                    @endforeach
                </tbody>
            @endif
        </table>

        {{-- include modal partials --}}
        @include('pages.kendaraan.modal-create')
        @include('pages.kendaraan.modal-edit')
        @include('pages.kendaraan.modal-pinjam')
        @include('pages.kendaraan.modal-servis')
    </div>
@endsection

@section('scripts')
    <script>
        // Edit modal fill
        $('#editModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            var modal = $(this);
            modal.find('form').attr('action', '/kendaraan/' + btn.data('id'));
            modal.find('input[name=nup]').val(btn.data('nup'));
            modal.find('select[name=jenis_kendaraan]').val(btn.data('jenis'));
            modal.find('input[name=merek_kendaraan]').val(btn.data('merek'));
            modal.find('input[name=nomor_polisi]').val(btn.data('nopol'));
            modal.find('input[name=nomor_rangka]').val(btn.data('rangka'));
            modal.find('input[name=nomor_mesin]').val(btn.data('mesin'));
            modal.find('input[name=tahun_pembuatan]').val(btn.data('pembuatan'));
            modal.find('input[name=nama_pemilik]').val(btn.data('pemilik'));
            modal.find('input[name=pajak_jatuh_tempo]').val(btn.data('pajak'));
            modal.find('input[name=stnk_kadaluarsa]').val(btn.data('stnk'));
        });

        // Pinjam modal
        $('#pinjamModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            $(this).find('input[name=kendaraan_id]').val(btn.data('id'));
        });

        // Servis modal
        $('#servisModal').on('show.bs.modal', function(e) {
            var btn = $(e.relatedTarget);
            $(this).find('input[name=kendaraan_id]').val(btn.data('id'));
        });
    </script>
@endsection
